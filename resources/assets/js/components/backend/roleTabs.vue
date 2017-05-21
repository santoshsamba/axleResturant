<template>
<div>
	<div class="tabDiv">
	    <ul class="">
	   	  <router-link to="/admin/role/addrole" tag="li" class="roleActive">
	   	  	<a>Role</a>
	   	  </router-link>
	   	  <router-link to="/admin/role/addemployees" tag="li">
	   	  	<a>User</a>
	   	  </router-link>
	   	  <router-link to="/admin/role/rolemapping" tag="li">
	   	  	<a>Role Mapping</a>
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