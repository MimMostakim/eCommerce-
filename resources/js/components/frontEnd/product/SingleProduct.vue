<template>
    <div class="product">
    <div class="section_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="product_content_container d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="product_content order-lg-1 order-2">
                            <div class="product_content_inner">
                                <div class="product_image_row">
                                    <div class="product_image_3 product_image"><img :src="singleProduct.pro_image" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="product_sidebar order-lg-2 order-1">
                            <div class="product_name">{{singleProduct.pro_name}}</div>
                            <div class="product_price">Tk. {{singleProduct.pro_price}}</div>
                            <form action="#" id="product_form" class="product_form" method="post" @submit.prevent="addToCart()">
                                <input type="text" name="qty" v-model="qty">
                                <input type="hidden" name="id" v-model="singleProduct.id">
                                <button type="submit" class="cart_button trans_200">add to cart</button>
                                <div class="similar_products_button trans_200"><a href="categories.html">see similar products</a></div>
                            </form>
                            <div class="product_links">
                                <ul class="text-center">
                                    <li><a href="#">See guide</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Returns</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        name: "single-product",
        data(){
            return{
                qty:'',
                id:''
            }
        },
        methods:{
            getSingleProduct(){
                this.$store.dispatch('singleProduct',this.$route.params.id)
            },
            addToCart(){
                axios.post('/add-to-cart',{
                    qty: this.qty,
                    id: this.singleProduct.id
                }).then(response => {
                    console.log(response.data)
                    this.$router.push('/cart')
                })
            }
        },
        computed:{
            singleProduct(){
                return this.$store.getters.getSingleProduct
            }
        },
        mounted(){
            this.getSingleProduct()
        }
    }
</script>

<style scoped>

</style>