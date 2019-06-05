<?php

namespace Webkul\Product\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Eloquent\Repository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Attribute\Repositories\AttributeOptionRepository;
use Webkul\Product\Models\ProductAttributeValue;
use Webkul\Product\Contracts\Criteria\ActiveProductCriteria;
use Webkul\Product\Contracts\Criteria\AttributeToSelectCriteria;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Product Repository
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ProductRepository extends Repository
{
    /**
     * AttributeRepository object
     *
     * @var array
     */
    protected $attribute;

    /**
     * AttributeOptionRepository object
     *
     * @var array
     */
    protected $attributeOption;

    /**
     * ProductAttributeValueRepository object
     *
     * @var array
     */
    protected $attributeValue;

    /**
     * ProductFlatRepository object
     *
     * @var array
     */
    protected $productInventory;

    /**
     * ProductImageRepository object
     *
     * @var array
     */
    protected $productImage;

    /**
     * Create a new controller instance.
     *
     * @param  Webkul\Attribute\Repositories\AttributeRepository             $attribute
     * @param  Webkul\Attribute\Repositories\AttributeOptionRepository       $attributeOption
     * @param  Webkul\Attribute\Repositories\ProductAttributeValueRepository $attributeValue
     * @param  Webkul\Product\Repositories\ProductInventoryRepository        $productInventory
     * @param  Webkul\Product\Repositories\ProductImageRepository            $productImage
     * @return void
     */
    public function __construct(
        AttributeRepository $attribute,
        AttributeOptionRepository $attributeOption,
        ProductAttributeValueRepository $attributeValue,
        ProductInventoryRepository $productInventory,
        ProductImageRepository $productImage,
        App $app)
    {
        $this->attribute = $attribute;

        $this->attributeOption = $attributeOption;

        $this->attributeValue = $attributeValue;

        $this->productInventory = $productInventory;

        $this->productImage = $productImage;

        parent::__construct($app);
    }

    /**->where('product_flat.visible_individually', 1)
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\Product\Contracts\Product';
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        //before store of the product
        Event::fire('catalog.product.create.before');

        $product = $this->model->create($data);

        $nameAttribute = $this->attribute->findOneByField('code', 'status');
        $this->attributeValue->create([
                'product_id' => $product->id,
                'attribute_id' => $nameAttribute->id,
                'value' => 1
            ]);

        if (isset($data['super_attributes'])) {

            $super_attributes = [];

            foreach ($data['super_attributes'] as $attributeCode => $attributeOptions) {
                $attribute = $this->attribute->findOneByField('code', $attributeCode);

                $super_attributes[$attribute->id] = $attributeOptions;

                $product->super_attributes()->attach($attribute->id);
            }

            foreach (array_permutation($super_attributes) as $permutation) {
                $this->createVariant($product, $permutation);
            }
        }

        //after store of the product
        Event::fire('catalog.product.create.after', $product);

        return $product;
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        Event::fire('catalog.product.update.before', $id);

        $product = $this->find($id);

        if ($product->parent_id && $this->checkVariantOptionAvailabiliy($data, $product)) {
            $data['parent_id'] = NULL;
        }

        $product->update($data);

        $attributes = $product->attribute_family->custom_attributes;

        foreach ($attributes as $attribute) {
            if (! isset($data[$attribute->code]) || (in_array($attribute->type, ['date', 'datetime']) && ! $data[$attribute->code]))
                continue;

            if ($attribute->type == 'multiselect') {
                $data[$attribute->code] = implode(",", $data[$attribute->code]);
            }

            $attributeValue = $this->attributeValue->findOneWhere([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'channel' => $attribute->value_per_channel ? $data['channel'] : null,
                    'locale' => $attribute->value_per_locale ? $data['locale'] : null
                ]);

            if (! $attributeValue) {
                $this->attributeValue->create([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'value' => $data[$attribute->code],
                    'channel' => $attribute->value_per_channel ? $data['channel'] : null,
                    'locale' => $attribute->value_per_locale ? $data['locale'] : null
                ]);
            } else {
                $this->attributeValue->update([
                    ProductAttributeValue::$attributeTypeFields[$attribute->type] => $data[$attribute->code]
                    ], $attributeValue->id
                );
            }
        }

        if (request()->route()->getName() != 'admin.catalog.products.massupdate') {
            if  (isset($data['categories'])) {
                $product->categories()->sync($data['categories']);
            }

            if (isset($data['up_sell'])) {
                $product->up_sells()->sync($data['up_sell']);
            } else {
                $data['up_sell'] = [];
                $product->up_sells()->sync($data['up_sell']);
            }

            if (isset($data['cross_sell'])) {
                $product->cross_sells()->sync($data['cross_sell']);
            } else {
                $data['cross_sell'] = [];
                $product->cross_sells()->sync($data['cross_sell']);
            }

            if (isset($data['related_products'])) {
                $product->related_products()->sync($data['related_products']);
            } else {
                $data['related_products'] = [];
                $product->related_products()->sync($data['related_products']);
            }

            $previousVariantIds = $product->variants->pluck('id');

            if (isset($data['variants'])) {
                foreach ($data['variants'] as $variantId => $variantData) {
                    if (str_contains($variantId, 'variant_')) {
                        $permutation = [];
                        foreach ($product->super_attributes as $superAttribute) {
                            $permutation[$superAttribute->id] = $variantData[$superAttribute->code];
                        }

                        $this->createVariant($product, $permutation, $variantData);
                    } else {
                        if (is_numeric($index = $previousVariantIds->search($variantId))) {
                            $previousVariantIds->forget($index);
                        }

                        $variantData['channel'] = $data['channel'];
                        $variantData['locale'] = $data['locale'];

                        $this->updateVariant($variantData, $variantId);
                    }
                }
            }

            foreach ($previousVariantIds as $variantId) {
                $this->delete($variantId);
            }

            $this->productInventory->saveInventories($data, $product);

            $this->productImage->uploadImages($data, $product);
        }

        Event::fire('catalog.product.update.after', $product);

        return $product;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        Event::fire('catalog.product.delete.before', $id);

        parent::delete($id);

        Event::fire('catalog.product.delete.after', $id);
    }

    /**
     * @param mixed $product
     * @param array $permutation
     * @param array $data
     * @return mixed
     */
    public function createVariant($product, $permutation, $data = [])
    {
        if (! count($data)) {
            $data = [
                    "sku" => $product->sku . '-variant-' . implode('-', $permutation),
                    "name" => "",
                    "inventories" => [],
                    "price" => 0,
                    "weight" => 0,
                    "status" => 1
                ];
        }

        $variant = $this->model->create([
                'parent_id' => $product->id,
                'type' => 'simple',
                'attribute_family_id' => $product->attribute_family_id,
                'sku' => $data['sku'],
            ]);

        foreach (['sku', 'name', 'price', 'weight', 'status'] as $attributeCode) {
            $attribute = $this->attribute->findOneByField('code', $attributeCode);

            if ($attribute->value_per_channel) {
                if ($attribute->value_per_locale) {
                    foreach (core()->getAllChannels() as $channel) {
                        foreach (core()->getAllLocales() as $locale) {
                            $this->attributeValue->create([
                                    'product_id' => $variant->id,
                                    'attribute_id' => $attribute->id,
                                    'channel' => $channel->code,
                                    'locale' => $locale->code,
                                    'value' => $data[$attributeCode]
                                ]);
                        }
                    }
                } else {
                    foreach (core()->getAllChannels() as $channel) {
                        $this->attributeValue->create([
                                'product_id' => $variant->id,
                                'attribute_id' => $attribute->id,
                                'channel' => $channel->code,
                                'value' => $data[$attributeCode]
                            ]);
                    }
                }
            } else {
                if ($attribute->value_per_locale) {
                    foreach (core()->getAllLocales() as $locale) {
                        $this->attributeValue->create([
                                'product_id' => $variant->id,
                                'attribute_id' => $attribute->id,
                                'locale' => $locale->code,
                                'value' => $data[$attributeCode]
                            ]);
                    }
                } else {
                    $this->attributeValue->create([
                            'product_id' => $variant->id,
                            'attribute_id' => $attribute->id,
                            'value' => $data[$attributeCode]
                        ]);
                }
            }
        }

        foreach ($permutation as $attributeId => $optionId) {
            $this->attributeValue->create([
                    'product_id' => $variant->id,
                    'attribute_id' => $attributeId,
                    'value' => $optionId
                ]);
        }

        $this->productInventory->saveInventories($data, $variant);

        return $variant;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateVariant(array $data, $id)
    {
        $variant = $this->find($id);

        $variant->update(['sku' => $data['sku']]);

        foreach (['sku', 'name', 'price', 'weight', 'status'] as $attributeCode) {
            $attribute = $this->attribute->findOneByField('code', $attributeCode);

            $attributeValue = $this->attributeValue->findOneWhere([
                    'product_id' => $id,
                    'attribute_id' => $attribute->id,
                    'channel' => $attribute->value_per_channel ? $data['channel'] : null,
                    'locale' => $attribute->value_per_locale ? $data['locale'] : null
                ]);

            if (! $attributeValue) {
                $this->attributeValue->create([
                        'product_id' => $id,
                        'attribute_id' => $attribute->id,
                        'value' => $data[$attribute->code],
                        'channel' => $attribute->value_per_channel ? $data['channel'] : null,
                        'locale' => $attribute->value_per_locale ? $data['locale'] : null
                    ]);
            } else {
                $this->attributeValue->update([
                    ProductAttributeValue::$attributeTypeFields[$attribute->type] => $data[$attribute->code]
                ], $attributeValue->id);
            }
        }

        $this->productInventory->saveInventories($data, $variant);

        return $variant;
    }

    /**
     * @param array $data
     * @param mixed $product
     * @return mixed
     */
    public function checkVariantOptionAvailabiliy($data, $product)
    {
        $parent = $product->parent;

        $superAttributeCodes = $parent->super_attributes->pluck('code');

        $isAlreadyExist = false;

        foreach ($parent->variants as $variant) {
            if ($variant->id == $product->id)
                continue;

            $matchCount = 0;

            foreach ($superAttributeCodes as $attributeCode) {
                if (! isset($data[$attributeCode]))
                    return false;

                if ($data[$attributeCode] == $variant->{$attributeCode})
                    $matchCount++;
            }

            if ($matchCount == $superAttributeCodes->count()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param integer $categoryId
     * @return Collection
     */
    public function getAll($categoryId = null)
    {
        $params = request()->input();

        $results = app('Webkul\Product\Repositories\ProductFlatRepository')->scopeQuery(function($query) use($params, $categoryId) {
                $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());

                $locale = request()->get('locale') ?: app()->getLocale();

                $qb = $query->distinct()
                        ->addSelect('product_flat.*')
                        ->addSelect(DB::raw('IF( product_flat.special_price_from IS NOT NULL
                            AND product_flat.special_price_to IS NOT NULL , IF( NOW( ) >= product_flat.special_price_from
                            AND NOW( ) <= product_flat.special_price_to, IF( product_flat.special_price IS NULL OR product_flat.special_price = 0 , product_flat.price, LEAST( product_flat.special_price, product_flat.price ) ) , product_flat.price ) , IF( product_flat.special_price_from IS NULL , IF( product_flat.special_price_to IS NULL , IF( product_flat.special_price IS NULL OR product_flat.special_price = 0 , product_flat.price, LEAST( product_flat.special_price, product_flat.price ) ) , IF( NOW( ) <= product_flat.special_price_to, IF( product_flat.special_price IS NULL OR product_flat.special_price = 0 , product_flat.price, LEAST( product_flat.special_price, product_flat.price ) ) , product_flat.price ) ) , IF( product_flat.special_price_to IS NULL , IF( NOW( ) >= product_flat.special_price_from, IF( product_flat.special_price IS NULL OR product_flat.special_price = 0 , product_flat.price, LEAST( product_flat.special_price, product_flat.price ) ) , product_flat.price ) , product_flat.price ) ) ) AS price'))

                        ->leftJoin('products', 'product_flat.product_id', '=', 'products.id')
                        ->leftJoin('product_categories', 'products.id', '=', 'product_categories.product_id')
                        ->where('product_flat.channel', $channel)
                        ->where('product_flat.locale', $locale)
                        ->whereNotNull('product_flat.url_key');

                if ($categoryId) {
                    $qb->where('product_categories.category_id', $categoryId);
                }

                if (is_null(request()->input('status'))) {
                    $qb->where('product_flat.status', 1);
                }

                if (is_null(request()->input('visible_individually'))) {
                    $qb->where('product_flat.visible_individually', 1);
                }

                $queryBuilder = $qb->leftJoin('product_flat as flat_variants', function($qb) use($channel, $locale) {
                    $qb->on('product_flat.id', '=', 'flat_variants.parent_id')
                        ->where('flat_variants.channel', $channel)
                        ->where('flat_variants.locale', $locale);
                });

                if (isset($params['sort'])) {
                    $attribute = $this->attribute->findOneByField('code', $params['sort']);

                    if ($params['sort'] == 'price') {
                        $qb->orderBy($attribute->code, $params['order']);
                    } else {
                        $qb->orderBy($params['sort'] == 'created_at' ? 'product_flat.created_at' : $attribute->code, $params['order']);
                    }
                }

                $qb = $qb->where(function($query1) {
                    foreach (['product_flat', 'flat_variants'] as $alias) {
                        $query1 = $query1->orWhere(function($query2) use($alias) {
                            $attributes = $this->attribute->getProductDefaultAttributes(array_keys(request()->input()));

                            foreach ($attributes as $attribute) {
                                $column = $alias . '.' . $attribute->code;

                                $queryParams = explode(',', request()->get($attribute->code));

                                if ($attribute->type != 'price') {
                                    $query2 = $query2->where(function($query3) use($column, $queryParams) {
                                        foreach ($queryParams as $filterValue) {
                                            $query3 = $query3->orWhere($column, $filterValue);
                                        }
                                    });
                                } else {
                                    $query2 = $query2->where($column, '>=', current($queryParams))->where($column, '<=', end($queryParams));
                                }
                            }
                        });
                    }
                });

                return $qb->groupBy('product_flat.id');
            })->paginate(isset($params['limit']) ? $params['limit'] : 9);

        return $results;
    }

    /**
     * Retrive product from slug
     *
     * @param string $slug
     * @return mixed
     */
    public function findBySlugOrFail($slug, $columns = null)
    {
        $attribute = $this->attribute->findOneByField('code', 'url_key');

        $attributeValue = $this->attributeValue->findOneWhere([
            'attribute_id' => $attribute->id,
            ProductAttributeValue::$attributeTypeFields[$attribute->type] => $slug
        ], ['product_id']);

        if ($attributeValue && $attributeValue->product_id) {
            $this->pushCriteria(app(ActiveProductCriteria::class));
            $this->pushCriteria(app(AttributeToSelectCriteria::class)->addAttribueToSelect($columns));

            $product = $this->findOrFail($attributeValue->product_id);

            return $product;
        }

        throw (new ModelNotFoundException)->setModel(
            get_class($this->model), $slug
        );
    }
    //TODO: Please check where price > cost, cost > 0
    /**
     * Get product best sell
     */
    public function getBestSellProducts() {
        $categories = array();
        $products = array();

        $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());
        $locale = request()->get('locale') ?: app()->getLocale();

        $buildSql = DB::table('categories')
            ->select(
                'categories.id as cate_id', 'categories.position as cate_position',
                'category_translations.id as cate_trans_id', 'category_translations.name as cate_trans_name', 'category_translations.slug as cate_trans_slug',
                'products.id as pro_id', 'products.type as pro_type',

                'product_flat.id as pro_flat_id', 'product_flat.sku as pro_flat_sku', 'product_flat.name as pro_flat_name',
                'product_flat.description as pro_flat_desc',  'product_flat.url_key as pro_flat_url_key', 'product_flat.new as pro_flat_new',
                'product_flat.featured as pro_flat_featured',  'product_flat.status as pro_flat_status', 'product_flat.thumbnail as pro_flat_thumbnail',
                'product_flat.price as pro_flat_price',  'product_flat.cost as pro_flat_cost', 'product_flat.special_price as pro_flat_special_price',
                'product_flat.special_price_from as pro_flat_special_price_from',  'product_flat.special_price_to as pro_flat_special_price_to', 'product_flat.weight as pro_flat_weight',
                'product_flat.color as pro_flat_color',  'product_flat.color_label as pro_flat_color_label', 'product_flat.size as pro_flat_size', 'product_flat.size_label as pro_flat_size_label',
                'product_flat.locale as pro_flat_locale',  'product_flat.channel as pro_flat_channel', 'product_flat.min_price as pro_flat_min_price', 'product_flat.max_price as pro_flat_max_price',

                'product_images.id as pro_img_id', 'product_images.path as pro_img_path'
            )
            ->join('category_translations', 'categories.id', '=', 'category_translations.category_id')
            ->join('product_categories', 'product_categories.category_id', '=', 'categories.id')
            ->join('products', 'products.id', '=', 'product_categories.product_id')
            ->join('product_flat', 'product_flat.product_id', '=', 'products.id')
            ->join('product_images', 'product_images.product_id', '=', 'products.id')
            ->where('product_flat.status', 1)
            ->where('product_flat.visible_individually', 1)
            ->where('product_flat.channel', $channel)
            ->where('product_flat.locale', $locale)
            ->orderBy('product_flat.product_id', 'desc');

        foreach($buildSql->cursor() as $valProduct) {
            if(isset($products['products'][$valProduct->pro_flat_id])) {
                $products['products'][$valProduct->pro_flat_id]['product_images'][] =
                    [
                        'pro_img_id' => $valProduct->pro_img_id,
                        'pro_img_path' => $valProduct->pro_img_path
                    ];
            } else {
                $categories['categories'][$valProduct->cate_trans_id] = array(
                    'cate_trans_id' => $valProduct->cate_trans_id,
                    'cate_trans_name' => $valProduct->cate_trans_name,
                    'cate_trans_slug' => $valProduct->cate_trans_slug
                );

                $products['products'][$valProduct->pro_flat_id] = array(
                    'pro_flat_id' => $valProduct->pro_flat_id,
                    'pro_flat_name' => $valProduct->pro_flat_name,
                    'pro_flat_price' => $valProduct->pro_flat_price,
                    'pro_flat_cost' => $valProduct->pro_flat_cost,
                    'cate_trans_id' => $valProduct->cate_trans_id,
                    'cate_trans_name' => $valProduct->cate_trans_name,
                    'cate_trans_slug' => $valProduct->cate_trans_slug
                );
                $products['products'][$valProduct->pro_flat_id]['product_images'][] = array(
                    'pro_img_id' => $valProduct->pro_img_id,
                    'pro_img_path' => $valProduct->pro_img_path
                );
            }
        }  
        
        foreach ($products['products'] as $product) {
            if(isset($categories['categories'][$product['cate_trans_id']])) {
                $categories['categories'][$product['cate_trans_id']]['products'][] = $product;
            }
        }
        return $categories;
    }

    /**
     * Returns newly added product
     *
     * @return Collection
     */
    public function getNewProducts()
    {
        $categories = array();
        $products = array();

        $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());
        $locale = request()->get('locale') ?: app()->getLocale();

        $buildSql = DB::table('categories')
            ->select(
                'categories.id as cate_id', 'categories.position as cate_position',
                'category_translations.id as cate_trans_id', 'category_translations.name as cate_trans_name', 'category_translations.slug as cate_trans_slug',
                'products.id as pro_id', 'products.type as pro_type',

                'product_flat.id as pro_flat_id', 'product_flat.sku as pro_flat_sku', 'product_flat.name as pro_flat_name',
                'product_flat.description as pro_flat_desc',  'product_flat.url_key as pro_flat_url_key', 'product_flat.new as pro_flat_new',
                'product_flat.featured as pro_flat_featured',  'product_flat.status as pro_flat_status', 'product_flat.thumbnail as pro_flat_thumbnail',
                'product_flat.price as pro_flat_price',  'product_flat.cost as pro_flat_cost', 'product_flat.special_price as pro_flat_special_price',
                'product_flat.special_price_from as pro_flat_special_price_from',  'product_flat.special_price_to as pro_flat_special_price_to', 'product_flat.weight as pro_flat_weight',
                'product_flat.color as pro_flat_color',  'product_flat.color_label as pro_flat_color_label', 'product_flat.size as pro_flat_size', 'product_flat.size_label as pro_flat_size_label',
                'product_flat.locale as pro_flat_locale',  'product_flat.channel as pro_flat_channel', 'product_flat.min_price as pro_flat_min_price', 'product_flat.max_price as pro_flat_max_price',

                'product_images.id as pro_img_id', 'product_images.path as pro_img_path'
            )
            ->join('category_translations', 'categories.id', '=', 'category_translations.category_id')
            ->join('product_categories', 'product_categories.category_id', '=', 'categories.id')
            ->join('products', 'products.id', '=', 'product_categories.product_id')
            ->join('product_flat', 'product_flat.product_id', '=', 'products.id')
            ->join('product_images', 'product_images.product_id', '=', 'products.id')
            ->where('product_flat.status', 1)
            ->where('product_flat.visible_individually', 1)
            ->where('product_flat.new', 1)
            ->where('product_flat.channel', $channel)
            ->where('product_flat.locale', $locale)
            ->orderBy('product_flat.product_id', 'desc');

        foreach($buildSql->cursor() as $valProduct) {
            if(isset($products['products'][$valProduct->pro_flat_id])) {
                $products['products'][$valProduct->pro_flat_id]['product_images'][] =
                    [
                        'pro_img_id' => $valProduct->pro_img_id,
                        'pro_img_path' => $valProduct->pro_img_path
                    ];
            } else {
                $categories['categories'][$valProduct->cate_trans_id] = array(
                    'cate_trans_id' => $valProduct->cate_trans_id,
                    'cate_trans_name' => $valProduct->cate_trans_name,
                    'cate_trans_slug' => $valProduct->cate_trans_slug
                );

                $products['products'][$valProduct->pro_flat_id] = array(
                    'pro_flat_id' => $valProduct->pro_flat_id,
                    'pro_flat_name' => $valProduct->pro_flat_name,
                    'pro_flat_price' => $valProduct->pro_flat_price,
                    'pro_flat_cost' => $valProduct->pro_flat_cost,
                    'cate_trans_id' => $valProduct->cate_trans_id,
                    'cate_trans_name' => $valProduct->cate_trans_name,
                    'cate_trans_slug' => $valProduct->cate_trans_slug
                );
                $products['products'][$valProduct->pro_flat_id]['product_images'][] = array(
                    'pro_img_id' => $valProduct->pro_img_id,
                    'pro_img_path' => $valProduct->pro_img_path
                );
            }
        }    

        $tmp = 0;
        foreach ($products['products'] as $product) {
            if(isset($categories['categories'][$product['cate_trans_id']])) {
                $categories['categories'][$product['cate_trans_id']]['products'.$tmp][] = $product;
                $counts = count($categories['categories'][$product['cate_trans_id']]['products'.$tmp]);

                if($counts == 2) {
                    $tmp++;
                }
            }
        }

        return $categories;
    }

    /**
     * Returns featured product
     *
     * @return Collection
     */
    public function getFeaturedProducts()
    {
        $results = app('Webkul\Product\Repositories\ProductFlatRepository')->scopeQuery(function($query) {
                $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());

                $locale = request()->get('locale') ?: app()->getLocale();

                return $query->distinct()
                        ->addSelect('product_flat.*')
                        ->leftJoin('products', 'product_flat.product_id', '=', 'products.id')
                        ->leftJoin('product_categories', 'products.id', '=', 'product_categories.product_id')
                        ->where('product_flat.status', 1)
                        ->where('product_flat.visible_individually', 1)
                        ->where('product_flat.featured', 1)
                        ->where('product_flat.channel', $channel)
                        ->where('product_flat.locale', $locale)
                        ->orderBy('product_id', 'desc');
            })->paginate(4);
        return $results;
    }

    /**
     * Search Product by Attribute
     *
     * @return Collection
     */
    public function searchProductByAttribute($term) {
        $results = app('Webkul\Product\Repositories\ProductFlatRepository')->scopeQuery(function($query) use($term) {
                $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());

                $locale = request()->get('locale') ?: app()->getLocale();

                return $query->distinct()
                        ->addSelect('product_flat.*')
                        ->where('product_flat.status', 1)
                        ->where('product_flat.visible_individually', 1)
                        ->where('product_flat.channel', $channel)
                        ->where('product_flat.locale', $locale)
                        ->whereNotNull('product_flat.url_key')
                        ->where('product_flat.name', 'like', '%' . $term . '%')
                        ->orderBy('product_id', 'desc');
            })->paginate(16);

        return $results;
    }
}