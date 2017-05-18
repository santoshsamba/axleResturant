<template>
        <div class="row">
            <div class="menuPage">
            <div v-show="showMsg"></div>
            <div class="menuRenderDiv">
                <div class="catDiv" v-for="item in fetchedCatData">
                <transition name="slide-fade">
                    <div class="form-group" v-show="showEditForm(item.foodCatId)">
                        <form @submit.prevent="updateFoodCat(item.foodCatId)">
                            <div class="form-group">
                              <label>Category Name</label>
                              <input type="text" id="" class="form-control" v-model="dataForEdit.foodCatName"/>
                            </div>
                        
                        <div style="margin-top:10px;">
                          <input type="submit" class="btn btn-success btn-sm" value="Save"/>
                          <input type="button" @click="foodCatBoxHide" class="btn btn-danger btn-sm" value="Cancel"/>
                        </div>
                        </form>
                    </div>
                </transition>
                    <div class="row foodCatBox"  v-show="!showEditForm(item.foodCatId)">
                        <div class="foodCatDiv">
                            <div class="col col-md-1 makeitzero">
                                <img src="/images/1.jpg" style="padding:0" alt="CategoryImage" width="60px" height="60px" />
                            </div>
                            <div class="col col-md-9" style="cursor:pointer;" @click="assignFoodId(item.foodCatId)">
                                <label style="font-size:22px;">{{ item.foodCatName }}</label>
                            </div>
                            <div class="col col-md-2 hideMe">
                                <div class="btn pull-right" @click="deleteFoodCat(item.foodCatId)"><i class="fa fa-times"></i></div>
                                <div class="btn pull-right" @click="assignFormId(item.foodCatId)"><i class="fa fa-pencil"></i></div>  
                            </div>
                        </div>
                        <transition name="slide-fade">
                            <div class="foodBox" v-show="toogleFoodBox(item.foodCatId)" >
                            <!-- particular food item div -->
                            <div v-for="foodItem in fetchedFoodData">
                                <div class="foodItemDiv" v-if="item.foodCatId == foodItem.foodCatId">
                                    <div class="row">
                                        <div class="col col-md-1 makeitzero">
                                            <img src="/images/1.jpg" style="padding:0" alt="CategoryImage" width="60px" height="60px" />
                                        </div>
                                        <div class="col col-md-8">
                                            <label>{{foodItem.foodName}}</label>
                                            <p> {{foodItem.foodPrice}}</p>
                                            <p>{{foodItem.foodDescription}}</p>
                                        </div>
                                        <div class="col col-md-3 hideMe1">
                                        <div class="btn pull-right" @click="deleteFoodCat(item.foodCatId)"><i class="fa fa-times"></i></div>
                                        <div class="btn pull-right" @click="assignFormId(item.foodCatId)"><i class="fa fa-pencil"></i></div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of particular food item div -->
                            <transition name="slide-fade">
                                <div class="foodFormDiv" v-show="toogleFoodFormDiv">
                                <div>
                                    <form @submit.prevent="addFoodItem(foodItemData, item.foodCatId)">
                                        <div class="row">
                                            <div class="col col-md-8 form-group">
                                                <label>Name</label>
                                                <input type="text" v-model="foodItemData.foodName" class="form-control" placeholder="Enter Food Name">
                                            </div>
                                            <div class="col col-md-4 form-group">
                                                <label>Price</label>
                                                <input type="text" v-model="foodItemData.foodPrice" class="form-control" placeholder="Enter Price Name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-12 form-group">
                                                <label>Desctiption</label>
                                                <input type="text" v-model="foodItemData.foodDescription" class="form-control" placeholder="Enter Food description" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-12 form-group">
                                                <input type="submit" class="btn btn-success btn-sm" value="Save"/>
                                                <input type="button" @click="toogleFoodFormDiv = false" class="btn btn-danger btn-sm" value="Cancel"/>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </transition>
                            <input type="button" class="btn btn-primary" @click="toogleFoodFormDiv = true" value="Add Food Item" />
                            </div>
                        </transition>
                    </div>
                </div>

            </div>
            <div class="noticeBox" v-show="showForm">
                <form @submit.prevent="addFoodCategory(dataFoodCategory)">
                   <input type="text" placeholder="Enter Category Type" class="form-control" v-model="dataFoodCategory.foodCatName">
                   <br />
                   <input type="submit" class="btn btn-success" value="Save"/>
                   <input type="button" @click="showForm = !showForm" class="btn btn-danger" value="Cancel"/>
                </form>
            </div>
            <input type="button" @click="showForm=!showForm" class="btn btn-primary" value="Add Category"/>
            </div>
        </div>
</template>

<script>
    export default {
        prop: ['tempval'],
        data(){
            return{
                toogleFoodFormDiv: false,
                editFoodId: '',
                showFoodBox: false,
                editFormId:'',
                showMsg: false,
                showForm: false,
                dataFoodCategory: {
                    foodCatName: ''
                },
                finalMsg:{},
                fetchedCatData:[],
                dataForEdit:{
                    foodCatName: ''
                },
                foodItemData:{
                    foodName:'',
                    foodPrice:'',
                    foodCatId:'',
                    foodImage:'',
                    foodDescription:''
                },
                fetchedFoodData:[]
            }
        },
        mounted() {
            this.getFoodCatData();
            this.getFoodData();
        },
        methods:{
            foodCatBoxHide: function foodCatBoxHide(){
                this.editFormId = '';
            },
            addFoodCategory: function addFoodCategory(foodData){
                console.log(foodData);
                axios.post('/foodcategory', foodData).then(response=>{
                        this.showMsg = true;
                        finalMsg="succes";
                        this.getFoodCatData();
                })
                .catch(error=>{
                    this.finalMsg = error.response.data;
                    console.log(this.errors);
                })
            },
            //to get category Names:
            getFoodCatData: function getFoodCatData(){
                self = this
                axios.get('/foodcategory').then(response=>{
                    self.fetchedCatData = response.data;
                })
                //setTimeout(this.getFoodCatData, 100);
            },
            assignFormId: function showEditForm(foodCatId){
                this.fetchedCatData.forEach((item, i)=>{
                    if(item.foodCatId == foodCatId){
                        this.dataForEdit = item;
                    }
                })
                return this.editFormId = foodCatId;
                console.log(this)
            },
            showEditForm:function showEditForm(foodCatId){
                if(this.editFormId == foodCatId){
                    return true;
                } 
                return false;
            },
            updateFoodCat: function updateFoodCat(foodcatid){
                axios.put('/foodcategory/'+foodcatid, this.dataForEdit)
                    .then(response=>{
                        this.editFormId = 0;
                    })
            },
            deleteFoodCat: function deleteFoodCat(foodcatid){
                let ok = confirm("Are you sure want to delete it ?");
                if(ok){
                    axios.delete('foodcategory/'+foodcatid).then(response=>{
                        this.getFoodCatData();
                    })
                 }
            },
            toogleFoodBox: function toogleFoodBox(foodCatId){
                if(this.editFoodId == foodCatId){
                    return true;
                }
                return false;
            },
            assignFoodId: function assignFoodId(foodCatId){
                this.toogleFoodFormDiv = false;
                if(this.editFoodId != foodCatId){
                    this.editFoodId = foodCatId;
                    this.foodFormDivRange = 0;
                }
                else{
                    this.editFoodId = 0;
                }
            },
            // duplicateForm: function duplicateForm(){
            //     this.foodFormDivRange += 1;
            // }
            addFoodItem: function addFoodItem(items, foodcatid){
                items.foodCatId = foodcatid;
                axios.post('/food', items).then(response=>{
                    this.clearFoodForm();
                })
            },
            clearFoodForm(){
                this.foodItemData.foodName = '';
                this.foodItemData.foodPrice = '';
                this.foodItemData.foodDescription = '';
            },
            // get Food Data
            getFoodData(){
                self = this
                axios.get('/food').then(response=>{
                    self.fetchedFoodData = response.data;
                })
            }
        }
    }
</script>
//xjkLCJLCjLZXJ