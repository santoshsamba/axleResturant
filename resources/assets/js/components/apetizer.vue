<template>
<div>
        <div class="row">
            <div class="col-md-12">
                    <h3>Apetizer</h3>
                    <div class="Gallery">
                        <ul>
                            <li v-for="item in ApetizerData">
                                <div class="imageDiv">
                                  <img :src="item.foodImage" alt="Avatar" class="image">
                                  <div class="overlay">
                                    <div class="text">
                                        <div class="col-md-6">
                                            <input type="button" class="btn btn-primary" value="Cut">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="button" class="btn btn-primary" @click="addMenuDetails()" value="Add">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="foodDetails">
                                    <div class="col-md-6">
                                    {{ item.foodName}}
                                    <input type="hidden" :value="item.foodId">
                                    </div>
                                    <div class="col-md-6">
                                    Price : Rs {{ item.foodPrice}}
                                    </div>
                                  </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
</div>
</template>

<script>
import account from './account.vue'
    export default {
        components:{
            account
        },
        data(){
            return{
                ApetizerData: [
                    {
                        foodId: 1,
                        foodImage: '/images/momo.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: '200'
                    },
                    {
                        foodId: 2,
                        foodImage: '/images/chowmin.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: '200'
                    },
                    {
                        foodId: 3,
                        foodImage: '/images/momo.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: '200'
                    },
                    {
                        foodId: 4,
                        foodImage: '/images/chowmin.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: '200'
                    },
                    {
                        foodId: 5,
                        foodImage: '/images/momo.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: '200'
                    },
                    {
                        foodId: 6,
                        foodImage: '/images/chowmin.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: '200'
                    }
                ]
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
