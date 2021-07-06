import Vue from "vue";
import Vuex, { Store } from "vuex";
Vue.use(Vuex);


import product_list from "./modules/product_list";
import product_cart from "./modules/product_cart";

const store = new Vuex.Store({
    modules: {
        product_list,
        product_cart,
    },
    state: {},
    getters: {},
    mutations: {},
    actions: {},

});
export default store;
