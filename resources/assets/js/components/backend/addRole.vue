<template>
	<div>
		<contentheader :headName="contentTitle"></contentheader>
	    <section class="content">
            this is role part
        </section> 
	</div>
</template>
<script>
import headerComp from './contentHeader'
	 export default {
	 	component: [headerComp],
	 	data(){
	 		return{
	 			contentTitle: 'Roles'
	 		}
	 	},
		mounted() {
		    console.log('Component mounted.')
		}
		}
</script>