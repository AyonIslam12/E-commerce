import Vue from "vue";
import Vuex, { Store } from "vuex";
Vue.use(Vuex);


import product_list from "./modules/product_list";

const store = new Vuex.Store({
    modules: {
        product_list,

    },
    state: {},
    getters: {},
    mutations: {},
    actions: {},

});
export default store;
