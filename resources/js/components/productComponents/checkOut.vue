<template>
  <div>
    <div class="row">
        <div class="col-12">
            <div class="checkout-title text-center mtb-20">
                <h1>Checkout</h1>
            </div>
        </div>
    </div>
    <div class="checkout-area">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 co-12">
                <div class="coupon-code-area p-20 mb-20">
                    <div class="returning-customer mb-10">
                        <i class="fa fa-book"></i>
                        <span>Have a coupon?</span>
                        <span class="code">Click here to enter your code</span>
                    </div>
                    <div class="code-form account-form p-20 clear box-shadow bg-fff" style="display: none;">
                        <form action="#">
                            <span class="form-row-first">
                                <input type="text" placeholder="Coupon Code">
                            </span>
                            <span class="form-row-last login-button">
                                <button>Apply Coupon</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-details-area">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="customer-details mb-50">
                    <div class="customer-details-title mb-10">
                        <h2>Billing Details</h2>
                    </div>
                    <div class="customer-details-form account-form p-20 clear">
                        <form action="#">
                            <span class="form-row-first">
                                <b>Name <span class="required">*</span></b>
                                <input v-model="billing_address.name" type="text">
                            </span>
                            <span class="form-row-first">
                                <b>Email Address <span class="required">*</span></b>
                                <input v-model="billing_address.email" type="email">
                            </span>
                            <span>
                                <b>Address <span class="required">*</span></b>
                                <input v-model="billing_address.address" type="text" placeholder="Street address">
                            </span>
                            <span>
                                <input v-model="billing_address.address2" type="text" placeholder="Apartment, suite, unit etc. (optional)">
                            </span>
                            <span>
                                <b>Town/City <span class="required">*</span></b>
                                <input v-model="billing_address.town" type="text" placeholder="your city/town">
                            </span>
                            <span>
                                <b>State <span class="required">*</span></b>
                                <input v-model="billing_address.state" type="text" placeholder="Apartment, suite, unit etc. (optional)">
                            </span>
                            <span>
                                <b>Phone <span class="required">*</span></b>
                                <input v-model="billing_address.phone" type="text" placeholder="017****">
                            </span>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="additional-information mb-50">
                    <div class="customer-details-title mb-10">
                        <h2>Additional Information</h2>
                    </div>
                    <b>Order Notes</b>
                    <textarea v-model="billing_address.order_notes"  cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                     <button @click.prevent="checout_confirm" class="btn btn-outline-success">Checkout</button>
                </div>

            </div>
        </div>
    </div>
    <div class="checkout-order-area mb-35">
        <div class="order-title pb-10 mb-20 text-uppercase">
            <h3>Your order</h3>
        </div>
        <div class="order_review table-responsive">
            <table>
                <tbody><tr>
                    <th class="product-name">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-name">Price</th>
                    <th class="product-total">Total</th>
                </tr>
                </tbody><tbody>
                    <tr class="cart_item" v-for="(cart,index) in get_carts" :key="index">
                          <td class="product-thumbnail">
                            <a :href="'/product-details/'+cart.product.id">
                                <img style="width:60px" :src="'/'+cart.product.thumb_image" alt="" />
                            </a>
                        </td>
                        <td class="product-name">
                            {{ cart.product.name }}
                        </td>
                        <td class="product-name">
                             <strong class="product-quantity"> {{ cart.qty }} X ${{cart.product.discount_price || cart.product.price}}</strong>
                        </td>
                        <td class="product-total">
                            <span>${{cart.qty* (cart.product.discount_price || cart.product.price)}}</span>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="cart-subtotal">
                        <th colspan="3" class="text-right">Subtotal</th>
                        <td>
                            <strong><span>$ {{get_sub_total}}</span></strong>
                        </td>
                    </tr>
                    <tr class="order-total">
                        <th colspan="3"  class="text-right">Total</th>
                        <td>
                            <strong><span>$ {{get_sub_total}}</span></strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
export default {
       data: function(){
       return{
           billing_address: {
            name:'',
            email:'',
            address:'',
            address2:'',
            town:'',
            state:'',
            phone:'',
            order_notes:'',

           }
       }
    },
    created: function(){
        this.billing_address = this.get_billing_address
    },
    methods:{
    ...mapMutations([
        'set_billing_address',

    ]),


     checout_confirm: function(){
          this.set_billing_address(this.billing_address);

            var stripe = Stripe("pk_test_51JAfGoGegh5E3HUjZ1VadWf7TGX0FVyQh0wspFL5AYjUU2q8ZUI3rjN8MNUtiFLPBgculGZz5OujWJHwVwY7EXs400kbWEmzAv");

            //axios.post("/checkout-confirm")
            axios.post("/checkout-confirm")
            .then(function (response) {
                return response.data;
            })
            .then(function (session) {
                // console.log('hi');
                return stripe.redirectToCheckout({ sessionId: session.id });
            })
            .then(function (result) {
                // If redirectToCheckout fails due to a browser or network
                // error, you should display the localized error message to your
                // customer using error.message.
                console.log(result);
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function (error) {
                console.error("Error:", error);
            });
        }

    },

    computed: {
    ...mapGetters([
        'get_carts',
        'get_billing_address',
        'get_sub_total'

    ]),
 }


}
</script>

<style>

</style>
