<script>
    export default {
        data() {
            return {
                config: {},
                childAttributes: [],
                selectedProductId: '',
                product: [
                    {
                        id: "",
                        type: "",
                        name: "",
                        sku: "",
                        price: "",
                        cost: "",
                        in_stock: "",
                        discount: "",
                    }
                ],
                galleryImages: [],
                errors: [],
            }
        },
        created () {
            var productId = id;
            if(typeof productId !== "undefined") {
                this.getProduct(productId);
            }
        },
        methods: {
            productIdActive () {
                var index = 0;
                var productId;
                Object.keys(this.config.index).forEach(function(i) {
                    if(index == 0) {
                        productId = i;
                    }
                    index++;
                });
                return productId;
            },
            getProduct (productId) {
                if(!productId)
                    return;
                axios.get('../api/products/'+productId)
                .then(response => {
                    this.product = response.data.data;
                })
                .catch(e => {
                    this.errors.push(e)
                })
            },
            changeOptionProduct (event) {
                if (!event) 
                    return;
                var el = event.target;
                $('.color-list').find('li > a').removeClass('active');
                if($(el).hasClass('active')) {
                    $(el).removeClass('active');
                } else {
                    $(el).addClass('active');
                }
                var productId = $(el).attr('attr-id-product');
                
                this.getProduct(productId);
                this.selectedProductId = productId;
            },
            addCart () {
                if (!event)
                    return;
                document.getElementById('product-form').submit();
            }
        }
    }
</script>
