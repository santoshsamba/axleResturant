<template>
<div>
	<contentheader :headName="contentTitle"></contentheader>
    <section class="content">
        <roletabs></roletabs>
        <div class="tabContent">
	    	<div class="form-div">
	    		<h2> Add Users </h2>
	    	<div class="form-div">
	    		<form @submit.prevent="addEmployee(employeeData)">
	    			<div class="form-group">
	    				<div class="row zeropaddingrow" >
	    					<div class="col col-md-6 zeropadding">
	    						<label class="formLabel ">First Name</label>
	    						<input type="text" name="" v-model="employeeData.firstName" placeholder="Enter First Name" class="form-control input-lg">
	    					</div>
	    					<div class="col col-md-6">
	    						<label class="formLabel">Last Name</label>
	    						<input type="text" name="" v-model="employeeData.lastName" placeholder="Enter Last Name" class="form-control input-lg">
	    					</div>
	    				</div>
	    				<div class="row zeropaddingrow" >
	    					<div class="col col-md-6 zeropadding">
	    						<label class="formLabel ">Email</label>
	    						<input type="text" name="" v-model="employeeData.email" placeholder="Enter Rmail Name" class="form-control input-lg">
	    					</div>
	    					<div class="col col-md-6">
	    						<label class="formLabel">Username</label>
	    						<input type="text" name="" v-model="employeeData.username" placeholder="Enter Username Name" class="form-control input-lg">
	    					</div>
	    				</div>
	    				<div class="row zeropaddingrow" >
	    					<div class="col col-md-6 zeropadding">
	    						<label class="formLabel ">Password</label>
	    						<input type="text" name="" v-model="employeeData.password" placeholder="Enter Password" class="form-control input-lg">
	    					</div>
	    					<div class="col col-md-6">
	    						<label class="formLabel">Confirm Password</label>
	    						<input type="text" name="" v-model="confirmPassword" placeholder="Confirm Password" class="form-control input-lg">
	    					</div>
	    				</div>
	    				<div class="row zeropaddingrow" >
	    					<div class="col col-md-6 zeropadding">
	    						<label class="formLabel">Address</label>
	    						<input type="text" name="" v-model="employeeData.address" placeholder="Enter Rmail Name" class="form-control input-lg">
	    					</div>
	    					<div class="col col-md-6">
	    						<label class="formLabel">Phone Number</label>
	    						<input type="text" name="" v-model="employeeData.phoneNumber" placeholder="Enter Username Name" class="form-control input-lg">
	    					</div>
	    				</div>
	    				<div class="row zeropaddingrow" >
	    					<div class="col col-md-6 zeropadding">
	    						<label class="formLabel">Status</label>
	    						<select class="form-control input-lg" id="" v-model="employeeData.status">
								    <option value="">Select Status</option>
								    <option value="1">Active</option>
								    <option value="0">Inactive</option>
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
			        <th>Users</th>
			        <th>Email</th>
			        <th>Username</th>
			        <th>Address</th>
			        <th>Phone Number</th>
			        <th>Status</th>
			        <th>Operation</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr v-for="(item, sno) in fetchedEmpData">
			        <td> {{sno += 1 }}</td>
			        <td> {{ item.firstName +" " + item.lastName }} </td>
			        <td> {{ item.email }} </td>
			        <td> {{ item.username }} </td>
			        <td> {{ item.address }} </td>
			        <td> {{ item.phoneNumber }} </td>
			        <td> {{ item.status == 1 ? 'Active' : 'Inactive'}} </td>
			        <td> 
			        	<button type="submit" class="btn btn-link" @click.prevent="getEmpForEdit(item)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" ></i></button>
				        <button type="submit" class="btn btn-link" @click.prevent="" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" ></i></button>
			        </td>
			      </tr>
			    </tbody>
			  </table>
			  </div>
	    	</div>
	    	<!-- modal -->
		  	<!-- Trigger the modal with a button -->
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
			              <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateEmployee(dataForEdit.id)">
			    			<div class="form-group">
				    				<div class="row zeropaddingrow" >
				    					<div class="col col-md-6 zeropadding">
				    						<label class="formLabel ">First Name</label>
				    						<input type="text" name="" v-model="dataForEdit.firstName" placeholder="Enter First Name" class="form-control input-lg">
				    					</div>
				    					<div class="col col-md-6">
				    						<label class="formLabel">Last Name</label>
				    						<input type="text" name="" v-model="dataForEdit.lastName" placeholder="Enter Last Name" class="form-control input-lg">
				    					</div>
				    				</div>
				    			</div>
				    			<div class="form-group">
				    				<div class="row zeropaddingrow" >
				    					<div class="col col-md-6 zeropadding">
				    						<label class="formLabel ">Email</label>
				    						<input type="text" name="" v-model="dataForEdit.email" placeholder="Enter First Name" class="form-control input-lg">
				    					</div>
				    					<div class="col col-md-6">
				    						<label class="formLabel">Username</label>
				    						<input type="text" name="" v-model="dataForEdit.username" placeholder="Enter Last Name" class="form-control input-lg">
				    					</div>
				    				</div>
				    			</div>
				    			<div class="form-group">
				    				<div class="row zeropaddingrow" >
				    					<div class="col col-md-6 zeropadding">
				    						<label class="formLabel ">Address</label>
				    						<input type="text" name="" v-model="dataForEdit.address" placeholder="Enter First Name" class="form-control input-lg">
				    					</div>
				    					<div class="col col-md-6">
				    						<label class="formLabel">Phone Number</label>
				    						<input type="text" name="" v-model="dataForEdit.phoneNumber" placeholder="Enter Last Name" class="form-control input-lg">
				    					</div>
				    				</div>
				    			</div>
				    			<div class="form-group">
				    				<div class="row zeropaddingrow" >
				    					<div class="col col-md-6 zeropadding">
				    						<label class="formLabel">Status</label>
				    						<select class="form-control input-lg" id="" v-model="dataForEdit.status">
											    <option value="">Select Status</option>
											    <option value="1">Active</option>
											    <option value="0">Inactive</option>
											</select>
				    					</div>
				    				</div>
				    			</div>
			    			<div class="form-group">
			    				<button type="submit" name="" class="btn btn-primary btn-lg btnLength"><i class="fa fa-save"></i><span> save</span></button>
								<div class="btn btn-danger btn-lg btnLength" @click="showModal = false"><i class="fa fa-remove"></i><span> cancel</span></div>
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
	 	component: [headerComp,roleTabs],
	 	data(){
	 		return{
	 			contentTitle: 'Employees',
	 			showModal: false,
	 			sno : 1,
	 			employeeData: {
	 				firstName: '',
	 				lastName: '',
	 				email: '',
	 				username: '',
	 				password: '',
	 				address: '',
	 				phoneNumber: '',
	 				status: ''
	 			},
	 			confirmPassword: '',
	 			fetchedEmpData: [],
	 			dataForEdit: []
	 		}
	 	},
		mounted() {
		    	this.getEmployees();
			},
		methods: {
			addEmployee: function addEmployee(empItems){
				axios.post('/employeeapi', empItems).then(response=>{
					this.employeeData = '';
					toastr.success('Item Inserted Successfully.', 'Success Alert', {timeOut: 5000});
					this.getEmployees();
                })
			},
			getEmployees: function getEmployees(){
					self = this;
					axios.get('/employeeapi').then(response=>{
					self.fetchedEmpData = response.data;
				})
			},
			getEmpForEdit: function getEmpForEdit(empdata){
					this.dataForEdit = empdata;
					this.showModal = true;
			},
			updateEmployee: function updateEmployee(empid){
				var tempdata = this.dataForEdit;
                this.$http.put('/employeeapi/'+empid, tempdata)
                   .then((response)=>{
                   	this.showModal = false;
                   	console.log(response.data);
                   	if(response.data == "success"){
                   		toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
                   	}else{
                   		toastr.success('Item Updated failed.', 'Success Alert', {timeOut: 5000});
                   	}
                })
			}
		}
	}
</script>