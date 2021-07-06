import axios from "axios";

// state list
const state = {
    carts: [],
}

// get state
const getters = {
    get_carts: state => state.carts,
    /* get_sub_total: state => state.sub_total,
    get_selected_cart: state => state.selected_cart,
    get_latest_saved_cart: state => state.latest_saved_cart, */
}

// actions
const actions = {
    /* fetch_latest_saved_cart: function(state){
        axios.get('/get_latest_checkout_information')
            .then((res)=>{
                this.commit('save_latest_saved_cart',res.data);
            })

    }, */
}

// mutators
const mutations = {
    set_carts: function(state,cart){
        state.carts.push(cart);
        console.log(state.carts);
    },
    remove_form_carts: function(state,cart){

        console.log(cart);
    },

}

export default {
    state,
    getters,
    actions,
    mutations
}
