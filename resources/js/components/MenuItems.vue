<template>
    <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
        <div class="card item-card">
            <div class="card-body p-0">
                <img :src="'uploads/products/'+product.image" class="img-fluid" alt="">
                <div class="info">
                    <div class="row">
                        <div class="col-sm-9">
                            <h5 class="name">{{product.product_name}}</h5>
                            <h6 class="mb-0 price"><img src="assets/images/veg.png" alt="">&#8377;{{product.price}}</h6>
                        </div>
                        <div class="col-sm-3">
                           <button type="button" class="btn btn-rounded btn-success btn-sm" @click="addToCart(product)">{{cart}}</button> 
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
export default {
    name:'MenuItem',
    props: ["product"],
    data() {
        return {
            cart: 'Add',
        };
    },   
    methods: {
        addToCart: function (item) { 
          this.$emit('update-cart', item)
        }
    },
}
</script>