<div class="d-flex flex-column-fluid" v-if="pageName == 'viewUsers'">
	<!--begin::Container-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-10">
				<h1 class="modal-title fs-5" style="font-family: 'Times New Roman', Times, serif;" id="staticBackdropLabel"><b>EMPLOYEES</b></h1>
			</div>
			<div class="col-2">
				<i class="fa-solid fa-plus " style="font-size:40px;padding-top:10px;"  data-toggle='modal' data-target='#addEmployeeModal'></i>
			</div>
		</div>


		<div class="row">
			<div class="col-xl-2" v-for="user,index in users" style="margin:10px;">
				<div class="productCard" >
					<div class="productThumb" style='position: relative;'>
						<img class="img-fluid" :src="'api/'+ user.emp_img" alt="ix" style="border-radius: 50%; height: 180px; width:400px;">
					</div>
					<div class="EmployeeContent" style="padding-left:10px; padding-top:10px">
						<span>{{user.lname}}</span>
						<span v-for="role,index in roles" v-if='user.role_id == role.role_id'><br>{{role.role_name}}</span>
						<span>
							<i class="fa-solid fa-square-caret-down" data-toggle="dropdown" class=" dropdown-toggle"></i>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item edit" href="javascript:void(0)" @click='getUserById(JSON.parse(JSON.stringify(user)))' data-target='#editUserModal' data-toggle='modal' data-dismiss="modal">
										<h5>Edit</h5>
									</a></li>
								<li><a class="dropdown-item" @click='deleteUsers(user.userid)' href="javascript:void(0)" style="color:red">
										<h5>Delete</h5>
									</a></li>
								<li><a class="dropdown-item" href="javascript:void(0)" v-if='user.status == 0' @click='activateUser(user.userid)' data-dismiss='modal'>
										<h5>Activate User</h5>
									</a></li>
								<li><a class="dropdown-item" href="javascript:void(0)" v-if='user.status == 1' @click='deactivateUser(user.userid)' data-dismiss='modal'>
										<h5>Deactivate User</h5>
									</a></li>
								<li><a class="dropdown-item" href="javascript:void(0)" v-if='user.role != 1' @click='makeAdmin(user.userid)' data-dismiss='modal'>
										<h5>Make Admin</h5>
									</a></li>
								<li><a class="dropdown-item" href="javascript:void(0)" v-if='user.counterlock >= 3' @click='unlockUser(user.userid)' data-dismiss='modal'>
										<h5>Unlock User</h5>
									</a></li>
							</ul>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>