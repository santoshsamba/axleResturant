<template>
<div>
	<div class="tabDiv">
	    <ul class="">
	   	  <router-link to="/admin/role/addrole" tag="li" v-bind:class="{roleActive : isActive }" @click="check()">
	   	  	<a> <i class="fa fa-plus-circle"></i> <span> Role</span></a>
	   	  </router-link>
	   	  <router-link to="/admin/role/addemployees" tag="li" v-bind:class="{roleActive : isActive }" @click="check">
	   	  	<a><i class="fa fa-plus-circle"></i> <span> User</span></a>
	   	  </router-link>
	   	  <router-link to="/admin/role/rolemapping" tag="li" v-bind:class="{roleActive : isActive }" @click="check">
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
				isActive: true
			}
		},
		methods: {
			check: function check(){
				alert("af");
				this.isActive = true;
			}
		}
	}
</script>