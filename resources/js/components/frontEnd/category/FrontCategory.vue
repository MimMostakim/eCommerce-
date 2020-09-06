<template>
    <div>

        <!-- Products -->

        <div class="products">

            <!-- Sorting & Filtering -->
            <div class="section_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="products_container grid">

                                <!-- Product -->
                                <div class="product grid-item hot" v-for="catPro in catProduct">
                                    <div class="product_inner">
                                        <div class="product_image">
                                            <img :src="`${catPro.pro_image}`" alt="">
                                            <div class="product_tag">hot</div>
                                        </div>
                                        <div class="product_content text-center">
                                            <div class="product_title"><a href="product.html">{{catPro.pro_name}}</a></div>
                                            <div class="product_price">{{catPro.pro_price}}</div>
                                            <div class="product_button ml-auto mr-auto trans_200"><a href="#">add to cart</a></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product -->


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
        name: "front-category",
        mounted(){
            this.$store.dispatch('catProducts',this.$route.params.id)
        },
        computed:{
            catProduct(){
                return this.$store.getters.getCategoryProduct
            }
        },
        methods:{
            getCatProduct(){
                this.$store.dispatch('catProducts',this.$route.params.id)
            }
        },
        watch:{
            $route(to,from){
                this.getCatProduct()
            }
        }
    }
</script>

<style scoped>

</style>