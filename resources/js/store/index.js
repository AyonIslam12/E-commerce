import Vue from "vue";
import createPersistedState from "vuex-persistedstate";
import Vuex, { Store } from "vuex";
Vue.use(Vuex);


import product_list from "./modules/product_list";
import product_cart from "./modules/product_cart";
import checkout from "./modules/checkout";

const store = new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        product_list,
        product_cart,
        checkout,
    },
    state: {},
    getters: {},
    mutations: {},
    actions: {},

});
export default store;
