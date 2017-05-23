<template>
<div>
	<div class="tabDiv">
	    <ul class="">
	   	  <router-link to="/admin/role/addrole" tag="li" class="roleActive">
	   	  	<a> <i class="fa fa-plus-circle"></i> <span> Role</span></a>
	   	  </router-link>
	   	  <router-link to="/admin/role/addemployees" tag="li">
	   	  	<a><i class="fa fa-plus-circle"></i> <span> User</span></a>
	   	  </router-link>
	   	  <router-link to="/admin/role/rolemapping" tag="li">
	   	  	<a><i class="fa fa-plus-circle"></i> <span> Role Mapping</span></a>
	   	  </router-link>
	   	 </ul>
	   	 </div>
		<router-view></router-view>
</div>
</template>
<script>
	export default{
		data(){
			return{

			}
		}
	}
</script>