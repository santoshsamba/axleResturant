<template>
<div>
	<contentheader :headName="contentTitle"></contentheader>
    <section class="content">
        <roletabs></roletabs>
        <div class="tabContent">
	        <h2> Employee Role Mapping </h2>
	    	<div class="form-div">
				<form @submit.prevent="addInPivot(pivotData)">
					<div class="form-group">
	    				<div class="row zeropaddingrow" >
	    					<div class="col col-md-6 zeropadding">
	    						<label class="formLabel">Role</label>
	    						<select class="form-control input-lg" v-model="pivotData.role_id">
								    <option value="" selected='selected'>-- Select Status --</option>
								    <option v-for="item in roleData" :value="item.id">{{ item.roleName }}</option>
								</select>
	    					</div>
	    				</div>
	    			</div>
	    			<div class="form-group">
	    				<div class="row zeropaddingrow" >
	    					<div class="col col-md-6 zeropadding">
	    						<label class="formLabel">Employees</label>
	    						<select class="form-control input-lg" v-model="pivotData.employee_id">
	    						<option value="" selected='selected'>-- Select Employee --</option>
				                  <option v-for="item in employeeData" :value="item.id">{{ item.firstName + " " + item.lastName }}</option>
				                </select>
	    					</div>
	    				</div>
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
			        <th>#</th>
			        <th>User</th>
			        <th>Role</th>
			        <th>Operation</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr v-for="(item, sno) in fetchedPivotData">
			        <td> {{ sno += 1 }}</td>
			        <td> {{ item.get_emp.firstName + " " + item.get_emp.lastName }} </td>
			        <td> {{ item.get_role.roleName }} </td>
			        <td> 
			        	<button type="submit" class="btn btn-link" @click.prevent="editEmpRoleInfo(item)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" ></i></button>
				        <button type="submit" class="btn btn-link" @click.prevent="" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" ></i></button>
			        </td>
			      </tr>
			    </tbody>
			  </table>
			  </div>
			  <transition name="modal">
			    <div class="modal-mask" v-show="showModal">
			      <div class="modal-wrapper">
			        <div class="modal-container">
			          <div class="modal-header">
			            <slot name="header">
			              <h3>Edit Employee</h3>
			            </slot>
			          </div>
			          <div class="modal-body">
			            <slot name="body">
			              <form @submit.prevent="updateEmpRole(editData.id)">
				    			<div class="form-group">
				    				<div class="row zeropaddingrow" >
				    					<div class="col col-md-6 zeropadding">
				    						<label class="formLabel">Role</label>
				    						<select class="form-control input-lg" v-model="editData.role_id">
											    <option value="" selected='selected'>-- Select Status --</option>
											    <option v-for="item in roleData" :value="item.id">{{ item.roleName }}</option>
											</select>
				    					</div>
				    				</div>
				    			</div>
				    			<div class="form-group">
				    				<div class="row zeropaddingrow" >
				    					<div class="col col-md-6 zeropadding">
				    						<label class="formLabel">Employee</label>
				    						<select disabled="true" class="form-control input-lg" v-model="editData.employee_id">
				    						<option value="">-- Select Employee --</option>
							                  <option v-for="item in employeeData" :value="item.id">{{ item.firstName + " " + item.lastName }}</option>
							                </select>
				    					</div>
				    				</div>
				    			</div>
			    			<div class="form-group">
			    				<button type="submit" name="" class="btn btn-primary btn-lg btnLength"><i class="fa fa-save"></i><span> save</span></button>
								<div class="btn btn-danger btn-lg btnLength" @click="cancelFunc"><i class="fa fa-remove"></i><span> cancel</span></div>
			    			</div>
			    		</form>
			            </slot>
			          </div>
			        </div>
			      </div>
			    </div>
			</transition>
    	</div>

    </section>
</div>
</template>
<script>
import headerComp from './contentHeader'
import roleTabs from './roleTabs'

	 export default {
	 	prop: ['options','on-search'],
	 	component: [headerComp,roleTabs],
	 	data(){
	 		return{
	 			selected: '',
	 			showModal: false,
	 			contentTitle: 'Employees',
	 			sno: 0,
	 			roleData: [],
	 			employeeData: [],
	 			pivotData: {
	 				employee_id: '',
	 				role_id: ''
	 			},
	 			fetchedPivotData: [],
	 			editData: []
	 		}
	 	},
	 	computed:{
	 	},
		mounted() {
				this.getRoleData();
				this.getEmpData();
				this.getPivotData();
			},
		methods: {
			getRoleData: function getRoleData(){
				self = this;
				axios.get('/roleapi').then(response=>{
					self.roleData = response.data;
				})	
			},
			getEmpData: function getEmpData(){
				self = this;
				axios.get('/employeeapi').then(response=>{
					self.employeeData = response.data;
				})
				return self.employeeData;
			},
			addInPivot: function addInPivot(pivotData){
				self = this
				axios.post('/emprolepivotapi', pivotData).then(response=>{
					if(response.data = "success"){
						toastr.success('Item Inserted Successfully.', 'Success Alert', {timeOut: 5000});
						this.getPivotData();
					}
					else{
						toastr.error('Item Inserted Failed.', 'Danger Alert', {timeOut: 5000});	
					}
				})
			},
			getPivotData: function getPivotData(){
				axios.get('/emprolepivotapi').then(response=>{
						this.fetchedPivotData = response.data;
					})
				},
			editEmpRoleInfo: function editEmpRoleInfo(empData){
				this.editData = empData;
				// this.editData.role_id = empData.role_id;
				// this.editData.role_id = empData.role_id;
				// this.editData.id = empData.id;
				this.showModal = true;
			},
			updateEmpRole: function updateEmpRole(pivotId){
				console.log(this.editData);
				axios.put('/emprolepivotapi/' +pivotId, this.editData)
                   .then((response)=>{
					toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
					this.getPivotData();
					this.showModal = false;
				})
			},
			cancelFunc: function cancelFunc(){
				this.editData.role_id = '';
				this.editData.employee_id = '';
				this.editData.id = '';
				this.showModal = false;
			}
		}
	}
</script>