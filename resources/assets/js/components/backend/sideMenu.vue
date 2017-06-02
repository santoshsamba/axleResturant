<template>
<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Main Navigation</li>
       <router-link to="/admin/dashboard" tag="li">
         <a><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
       </router-link>
       <router-link to="/admin/menu" tag="li">
         <a><i class="fa fa-dashboard"></i> <span>Menu Setup</span></a>
       </router-link>
    </ul>
</section>
</template>
<script>
	export default {
		data() {
			return {
				}
		},
		computed:{
		},
        methods:{
        }
	}
</script>