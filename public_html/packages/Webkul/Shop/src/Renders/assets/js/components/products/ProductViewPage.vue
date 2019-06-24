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
            if(type == "simple") {
                this.selectedProductId = id;
                var productId = this.selectedProductId;
                this.getProduct(productId);
            } else {
                this.config = config;
                this.selectedProductId = this.productIdActive();
                var productId = this.selectedProductId;
            }
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
                var selected_configurable_option = productId;

                axios.post("../checkout/cart/add/"+productId, {'selected_configurable_option': selected_configurable_option,'quantity' : quantity, '_token': token})
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
