require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Vuex from 'vuex'
Vue.use(Vuex)

import storeData from './store'
const store = new Vuex.Store(
    storeData
)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('front-header', require('./components/frontEnd/includes/header.vue').default);
Vue.component('front-sidebar', require('./components/frontEnd/includes/sidebar.vue').default);
Vue.component('front-main', require('./components/frontEnd/FrontMaster.vue').default);
Vue.component('front-footer', require('./components/frontEnd/includes/footer.vue').default);

import {routes} from './routes'

const router = new VueRouter({
    routes,
    mode:'history'
})

const app = new Vue({
    el: '#app',
    router,
    store
});
