<template>
<div>
	<contentheader :headName="contentTitle"></contentheader>
    <section class="content">
        <roletabs></roletabs>
        <div class="tabContent">
	        <h2> Add Role </h2>
	    	<div class="form-div">
	    		<form @submit.prevent="addRole(roleData)">
	    			<div class="form-group">
	    				<label class="formLabel">Role Name</label>
	    				<input type="text" name="" placeholder="Enter Role Name" v-model="roleData.roleName" class="form-control input-lg">
	    			</div>
	    			<div class="form-group">
	    				<button type="submit" name="" class="btn btn-primary btn-lg btnLength"><i class="fa fa-save"></i><span> save</span></button>
	    			</div>
	    		</form>
	    	</div>
	    	<div class="table-responsive">          
			  <table class="table">
			    <thead>
			      <tr>
			        <th>S.No</th>
			        <th>Firstname</th>
			        <th>Operation</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr v-for="(item, sno) in fetchedRoleData">
			        <td>{{ sno += 1 }}</td>
			        <td>{{ item.roleName }}</td>
			        <td><button type="submit" class="btn btn-link" @click.prevent="getRoleForEdit(item)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" ></i></button>
			        <button type="submit" class="btn btn-link" @click.prevent="deleteRole(item.id)" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" ></i></button>
			        </td>
			      </tr>
			    </tbody>
			  </table>
			  </div>
			  <!-- modal -->

			  <!-- Trigger the modal with a button -->
				<transition name="modal">
				    <div class="modal-mask" v-show="showModal">
				      <div class="modal-wrapper">
				        <div class="modal-container">

				          <div class="modal-header">
				            <slot name="header">
				              <h3>Edit Role</h3>
				            </slot>
				          </div>

				          <div class="modal-body">
				            <slot name="body">
				              <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateRole(roleForEdit.id)">
				    			<div class="form-group">
				    				<label class="formLabel">Role Names</label>
				    				<input type="text" name="" placeholder="Enter Role Name" v-model="roleForEdit.roleName" class="form-control input-lg">
				    			</div>
				    			<div class="form-group">
				    				<input type="submit" class="btn btn-success btn-sm" value="Save"/>
				    				<input type="button" value="Cancel" class="btn btn-danger btn-lg btnLength" @click="showModal = false" />
				    			</div>
				    		</form>
				            </slot>
				          </div>
				        </div>
				      </div>
				    </div>
				  </transition>
  </modal>
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
	 			showModal: false,
	 			sno : 1,
	 			fetchedRoleData: [],
	 			contentTitle: 'Roles',
	 			roleData:{
	 				roleName: ''
	 			},
	 			// roleid: '',
	 			roleForEdit: {
	 				id: '',
	 				roleName: ''
	 			}
	 		}
	 	},
		mounted() {

		    	this.fetchmethodforrole();
			},
		methods: {
			fetchmethodforrole: function fetchmethodforrole(){
					self = this;
					axios.get('/roleapi').then(response=>{
					self.fetchedRoleData = response.data;
				})
			},
			addRole: function addRole(roleItems){
				axios.post('/roleapi', roleItems).then(response=>{
					this.fetchmethodforrole();
					toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
                })
			},
			getRoleForEdit: function getRoleForEdit(roleinfos){
					this.roleForEdit = roleinfos;
					this.showModal = true;
					
			},
			deleteRole: function deleteRole(id){
					let a = confirm("asdf");
			},
			updateRole: function updateRole(roleid){
				var tempdata = this.roleForEdit;
                this.$http.put('/roleapi/'+roleid, tempdata)
                   .then((response)=>{
                   	this.showModal = false;
                   	toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
                    })
            },
		}
	}
</script>