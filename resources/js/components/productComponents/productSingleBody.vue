<template>
 <div>
    <div class="row">
        <div class="col-md-3" v-for="product in get_product_list.data " :key="product.id">
            <div class="product-wrapper bl">
                <div class="product-img">
                    <a href="#">
                          <img :src="'/'+product.thumb_image" alt="" class="primary" />
                        <img :src="'/'+product.image[1].name" alt="" class="secondary" />
                    </a>
                    <div class="product-icon c-fff home3-hover-bg">
                        <ul>
                            <li>
                                <a href="#" data-toggle="tooltip" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-comments"></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="Accumsan eli"><i class="fa fa-search"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="product-content home3-hover">
                    <h3><a :href="'/product-details/'+product.id">{{product.name}}</a></h3>
                    <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>$ {{product.price}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import { mapGetters,mapActions } from "vuex";
export default {
    created: function(){
        this.fetch_product_list();
    },
    methods: {
        ...mapActions([
            'fetch_product_list'
    ]),
    },

 computed: {
    ...mapGetters([
        'get_product_list',
    ]),
}

}
</script>

<style>
 .product-wrapper {
        box-shadow: 0px 0px 5px #1077d140;
        height: 92%;
        margin: 15px 0px;
    }
    .product-content h3 a {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        padding: 10px 0px;
    }
</style>
