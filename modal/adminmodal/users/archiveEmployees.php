 <div class="d-flex flex-column-fluid" v-if="pageName == 'archiveEmployees'">
 	<!--begin::Container-->
 	<div class="container-fluid">
 		<a href="index.php">
 			<i class="fa-solid fa-house fa-2xl"></i>
 		</a>
 		<h3 class="modal-title fs-5" style="font-family: 'Times New Roman', Times, serif;" id="staticBackdropLabel"><b>EMPLOYEES</b></h3>
 		<div class="modal-body table-responsive">
 			<table class="table table-bordered">
 				<thead class="kt-table-thead text-body">
 					<tr>
 						<th class="kt-table-cell"><b>No.</b></th>
 						<th class="kt-table-cell"><b>First Name</b></th>
 						<th class="kt-table-cell"><b>Last Name</b></th>
 						<th class="kt-table-cell"><b>Email</b></th>
 						<th class="kt-table-cell"><b>Username</b></th>
 						<th class="kt-table-cell"><b>role</b></th>
 						<th class="kt-table-cell"><b>Status</b></th>
 						<th class="kt-table-cell"><b>CounterLock</b></th>
 						<th class="kt-table-cell"><b>Date Added</b></th>
 						<th class="kt-table-cell"><b>Options</b></th>
 					</tr>
 				</thead>
 				<tbody class="kt-table-tbody text-dark table-group-divider">
 					<tr class="kt-table-row kt-table-row-level-0" v-for="user,index in users">
 						<td class="kt-table-cell">{{ index+1 }}</td>
 						<td class="kt-table-cell">{{ user.fname }}</td>
 						<td class="kt-table-cell">{{ user.lname }}</td>
 						<td class="kt-table-cell">{{ user.email }}</td>
 						<td class="kt-table-cell">{{ user.uname }}</td>
 						<td class="kt-table-cell">{{ user.role }}</td>
 						<td class="kt-table-cell">{{ user.status }}</td>
 						<td class="kt-table-cell">{{ user.counterlock }}</td>
 						<td class="kt-table-cell">{{ user.date_inserted }}</td>
 						<td class="kt-table-cell">
 							<div class="btn-group">
 								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
 									Action
 								</button>
 								<ul class="dropdown-menu">
 									<li><a class="dropdown-item" @click='deleteCategory(category.cat_id)' data-dismiss='modal' href="javascript:void(0)" style="color: red;">
 											<h5><b>Undo</b></h5>
 										</a></li>
 							</div>
 						</td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>