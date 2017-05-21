<template>
<div>
	<contentheader :headName="contentTitle"></contentheader>
    <section class="content">
        <roletabs></roletabs>
        <div class="tabContent">
	        <h2> Add Employees </h2>
	    	<div class="form-div">
	    		Create Form Here
	    	</div>
    	</div>
    </section> 
</div>
</template>
<script>
import headerComp from './contentHeader'
import roleTabs from './roleTabs'
	 export default {
	 	component: [headerComp,roleTabs],
	 	data(){
	 		return{
	 			contentTitle: 'Employees'
	 		}
	 	},
		mounted() {
		    console.log('Component mounted.')
			},
		methods: {
			test(){
				alert("tbus");
			}
		}
	}
</script>