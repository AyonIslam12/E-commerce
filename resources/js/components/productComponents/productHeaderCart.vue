<template>
  <div>
       <div class="cart">
        <i class="icofont icofont-bag"></i>
        <a href="#">
           4 Items - <strong>$500.00 </strong>
            <i class="icofont icofont-rounded-down"></i>
        </a>
    </div>
    <ul>
        <li>
            <div class="cart-items">
                <div class="cart-item bb mt-10" v-for="(cart,index) in get_carts" :key="index">
                    <div class="cart-img">
                        <a href="#">
                          <img :src="'/'+cart.product.thumb_image" alt="" />
                        </a>
                    </div>
                    <div class="cart-content">
                        <a href="#">{{cart.product.name}}</a>
                        <a href="#" class="pull-right cart-remove"> <i class="fa fa-times"></i></a>
                        <span>{{ cart.qty }} x {{cart.product.discount_price || cart.product.price}}</span>
                    </div>
                </div>
                <div class="total mt-10">
                    <span class="pull-left">Subtotal:</span>
                    <span class="pull-right">$200.00</span>
                </div>
                <div class="cart-btn mb-20">
                    <a href="#">view cart</a>
                    <a href="#">Checkout</a>
                </div>
            </div>
        </li>
    </ul>
  </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
export default {
      computed: {
    ...mapGetters([
        'get_carts',

    ]),
 }

}
</script>

<style>

</style>
