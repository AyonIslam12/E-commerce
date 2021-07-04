require('./bootstrap');

window.Vue = require('vue').default;
//import vuex
const { default: store } = require('./store/index');


//Components destination
Vue.component('productSingleBody', require('./components/productComponents/productSingleBody.vue').default);
Vue.component('productDetails', require('./components/productComponents/productDetails.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

  if (document.getElementById("productList")) {
    const app = new Vue({
        el: "#productList",
        store,

    });
}

