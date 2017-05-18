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
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <input type="button" class="btn btn-primary" @click="addMenuDetails(item)" value="Add">
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

            <!-- account note -->
            <div class="accountDiv">
			    Table No :
			    <div class="itemBox">
				    <table width="100%" class="foodTable">
				    	<tr v-for="(item,index) in roughData">
				    		<td>{{index}}</td>
					    	<td style="padding:0 10px;">{{ item.food }}</td>
					    	<td >{{item.price}}</td>
					    	<td><input type="button" class="" @click="removeFoodItems(item.price,index)" value="X"></td>
				    	</tr>
				    </table>
			    </div>
            		    <div class="totalBox">
            		    	Total: <label>{{totalPrice}}</label>
            		    </div>
            		    <div >
            	    </div>
                </div>
        <div class="this">
            <div class="abcd">
                tjis is it
            </div>
        </div>
</div>


</template>
<script>

	export default {
		data() {
			return {
				ApetizerData: [
                    {
                        foodId: 1,
                        foodImage: '/images/momo.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: 100
                    },
                    {
                        foodId: 2,
                        foodImage: '/images/chowmin.jpg',
                        foodName: 'chowmin',
                        foodPrice: 200
                    },
                    {
                        foodId: 3,
                        foodImage: '/images/momo.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: 50
                    },
                    {
                        foodId: 4,
                        foodImage: '/images/chowmin.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: 70
                    },
                    {
                        foodId: 5,
                        foodImage: '/images/momo.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: 100
                    },
                    {
                        foodId: 6,
                        foodImage: '/images/chowmin.jpg',
                        foodName: 'Mo Mo',
                        foodPrice: 100
                    }
                ],
                roughData:[
                    {
                    	fid:'',
                    	food:'',
                    	price:'',
                    }
                ],
                totalAmount:0,
                tempTotal:0
			}
		},
		computed:{
			totalPrice: function(){
				return this.totalAmount;
			}
		},
        methods:{
            addMenuDetails: function(food){
	                this.roughData.push({fid: food.foodId, food: food.foodName, price: food.foodPrice});
	                this.tempTotal = food.foodPrice;
	                this.totalAmount = this.totalAmount + this.tempTotal;
            	},
	    	removeFoodItems: function(price,index){
	    		this.totalAmount = this.totalAmount - price;
	    		this.roughData.splice(index,1);
	    	}
        }
	}
</script>