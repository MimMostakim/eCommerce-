export default {
    state:{
        all_products:[],
        category_products:[],
        single_product: [],
        cart_product:[]
    },
    getters:{
        getProduct(state){
            return state.all_products
        },
        getCategoryProduct(state){
            return state.category_products
        },
        getSingleProduct(state){
            return state.single_product
        },
        getCartProduct(state){
            return state.cart_product
        }
    },
    actions:{
        allProducts(context){
            axios.get('/index')
                .then(response => {
                    //console.log(response.data.products)
                    context.commit('allproducts',response.data.products)
                })
        },
        catProducts(context,payload){
            axios.get('/category-products/'+payload)
                .then(response => {
                    console.log(response.data.categoryProducts)
                    context.commit('categoryproducts',response.data.categoryProducts)
                })
        },
        singleProduct(context,payload){
            axios.get('/product-details/'+payload)
                .then(response => {
                    console.log(response.data.singleProduct)
                    context.commit('singleproduct',response.data.singleProduct)
                })
        },
        cartProduct(context){
            axios.get('/show-cart')
                .then(response => {
                    //console.log(response.data.cartProducts)
                    context.commit('cartproducts',response.data.cartProducts)
                })
        },
    },
    mutations:{
        allproducts(state,data){
            return state.all_products = data
        },
        categoryproducts(state,payload){
            return state.category_products = payload
        },
        singleproduct(state,payload){
            return state.single_product = payload
        },
        cartproducts(state,data){
            return state.cart_product = data
        }
    }
}