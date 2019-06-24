<script>
    export default {
        data() {
            return {
                config: {},
                childAttributes: [],
                selectedProductId: '',
                product: [
                    {
                        name: "",
                        sku: "",
                        price: "",
                        in_stock: "",
                    }
                ],
                galleryImages: [],
                errors: [],
            }
        },
        created () {
            this.config = config;
            this.selectedProductId = this.productIdActive();
            var productId = this.selectedProductId;
            this.getProduct(productId);
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
                    this.galleryImages = response.data.data.images;
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
                var productId = this.selectedProductId;
                var quantity = $('input[name="quantity"]').val();
                let token = document.head.querySelector('meta[name="csrf-token"]').content;

                axios.post("../checkout/cart/add/"+productId, {'quantity' : quantity, '_token': token})
                    .then(response => {
                        console.log(response)
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            }
        }
    }
</script>
