import FrontHome from './components/frontEnd/home/FrontHome'
import FrontCategory from './components/frontEnd/category/FrontCategory'
import SingleProduct from './components/frontEnd/product/SingleProduct'
import CartComponent from './components/frontEnd/cart/CartComponent'

export const routes = [
    {
        path: '/',
        component: FrontHome
    },
    {
        path: '/category/:id',
        component: FrontCategory
    },
    {
        path: '/single-product/:id',
        component: SingleProduct
    },
    {
        path: '/cart',
        component: CartComponent
    },
]