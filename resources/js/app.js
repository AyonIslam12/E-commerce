/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('singleProductBody', require('./components/singleProductBody.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 if (document.getElementById("app")) {
    const app = new Vue({
        el: "#app",
        created: function () {
            this.get_product_pagination();
        },
        data: function () {
            return {
                //products: [],
                products: {},
                pos_product_list: [],
               // pos_total_price: 0, //for total price
            };
        },
        methods: {
            //for pagination purpose
            get_product_pagination: function(page=1){
                $.get("/json/latest-products-json?page="+page, (res) => {
                    //this.products = res.data;
                    this.products = res;
                });
            },
           search_product: _.debounce(function(key){
               key.length > 0 ?
               $.get("/json/search-product-json/"+key, (res) => {
                //this.products = res.data;
                this.products = res;
            })
            :
            this.get_product_pagination();
            },500),
            //for add product to pos table
            add_product_to_pos_list: function (product) {
                //for quNTITY
                let product_check = this.pos_product_list.find((item) => item.id === product.id);
                if (product_check) {
                    product_check.qty++;
                } else {
                    let pos_product = {
                        id: product.id,
                        name: product.name,
                        image: product.thumb_image,
                        price: product.price,
                        qty: 1,
                    };
                    this.pos_product_list.unshift(pos_product);
                    console.log(product.name);
                }
                //for total price
                //this.update_pos_total_price();
            },

            //for remove product from pos table
            remove_pos_product: function (product) {
                this.pos_product_list = this.pos_product_list.filter((item) => item.id != product.id);
                //this.update_pos_total_price();
            },

            //for update qty price
            update_pos_qty: function (product, qty) {
                let check_product = this.pos_product_list.find((item) => item.id === product.id);
                check_product.qty = qty;
                //this.update_pos_total_price();
            },

            //for total price
            /* update_pos_total_price: function () {
                this.pos_total_price = this.pos_product_list.reduce((total, product) => {
                    return total + product.price * product.qty;
                }, 0);
            }, */
        },

        computed:{
            get_total_pos_price: function(){
                this.pos_total_price = this.pos_product_list.reduce((total, product) => {
                    return total + product.price * product.qty;
                }, 0);
                return this.pos_total_price;

            }
        }
    });
}

/* if(document.getElementById('test')){
    const app = new Vue({
        el: "#test",
        data: function(){
            return{
                name: 'hlw',
                a: 90,
                b: 30,
                add: '',
                div: '',
                sub: '',
            }
        },
        methods:{
            calculate: function(){
                this.add = +(this.a) + +(this.b);
                this.div = +(this.a) / +(this.b);
                this.sub = +(this.a) - +(this.b);

            }
        }
    });
} */
