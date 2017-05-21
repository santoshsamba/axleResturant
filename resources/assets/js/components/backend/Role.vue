<template>
	<div>
		<contentheader :headName="contentTitle"></contentheader>
	    <section class="content">
            <roletabs></roletabs>

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
	 			contentTitle: 'Roles'
	 		}
	 	},
		mounted() {
		    console.log('Component mounted.')
			}
		}
</script>