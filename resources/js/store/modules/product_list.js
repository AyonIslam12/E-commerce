import axios from "axios";

//state list
const state = {
   product_list: [],
   product_details: { },

}

//get state
const getters = {
    get_product_list: state=> state.product_list,
    get_product_details: state=> state.product_details,

}

//action
const actions ={
   fetch_product_list: function(state,page=1){
        axios.get('/json/latest-products-json?page='+page)
        .then((res)=>{
            this.commit('set_product_list',res.data);
        })
    },
}
//mutation
const mutations ={
    set_product_list: function(state,product_list){
        state.product_list = product_list;
    },
   set_product_details: function(state, product_details){
        state.product_details = product_details;
    },
}
export default{
    state,
    getters,
    actions,
    mutations
}
