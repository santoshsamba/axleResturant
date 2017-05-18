<template>
<div class="accountDiv">
    Table No :
    <div v-for="item in  roughData">
        <label>{{item.first}}</label>

    </div>
</div>
</template>

<script>
import appitzer from './apetizer.vue'
    export default {
        components:{
            appitzer
        },
        data(){
            return{
                roughData:[
                    {first:''}
                ]
                }
        },
        porp:[
            'menuadd'
        ],
        methods:{
            addMenuDetails: function(){
                alert("adf");
                this.roughData.push({first: 'asdf'});
            }
        }
    }
</script>
