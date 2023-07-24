<div class="d-flex flex-column-fluid" v-if="pageName == 'casual'">
 	<!--begin::Container-->
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-10">
 				<h1 class="modal-title fs-5 text-success" id="staticBackdropLabel"><b>Casuals</b></h1>
 			</div>
             <div class="col-2"><button class="btn btn-success" @click="exportToExcelCasual">Export to Excel</button></div>
 		</div>
 		<div class="modal-body table-responsive ">
 			<table class="table table-bordered ">
 				<thead class="kt-table-thead text-body">
 					<tr>
 						<th class="kt-table-cell text-center"><b>No.</b></th>
 						<th class="kt-table-cell text-center"><b>First Name</b></th>
						 <th class="kt-table-cell text-center"><b>Last Name</b></th>
						 <th class="kt-table-cell text-center"><b>M.I.</b></th>
                         <th class="kt-table-cell text-center"><b>Gender</b></th>
                         <th class="kt-table-cell text-center"><b>ID  Number</b></th>
                         <th class="kt-table-cell text-center"><b>Birthdate</b></th>
                         <th class="kt-table-cell text-center"><b>Date of Employment</b></th>
                         <th class="kt-table-cell text-center"><b>Options</b></th>
 					</tr>
 				</thead>
 				<tbody class="kt-table-tbody text-dark table-group-divider">
 					<tr class="kt-table-row kt-table-row-level-0 text-info" v-for="cas,index in casuals">
 						<td class="kt-table-cell text-center">{{ index+1 }}</td>
 						<td class="kt-table-cell text-center">{{ cas.fname }}</td>
 						<td class="kt-table-cell text-center">{{ cas.lname }}</td>
						<td class="kt-table-cell text-center">{{ cas.m_i }}</td>
                        <td class="kt-table-cell text-center">{{ cas.gender }}</td>
                        <td class="kt-table-cell text-center">{{ cas.id_number }} - {{cas.endNum}}</td>
                        <td class="kt-table-cell text-center">{{ cas.birthdate}}</td>
                        <td class="kt-table-cell text-center">{{ cas.date_of_employment }}</td>
 						<td class="kt-table-cell text-center">
						 	<span><i class="fa-solid fa-trash" style="color: red;" @click='deleteEmployee(cas.emp_id)'></i></span>
 							<span><i class="fa-solid fa-pen-to-square" style="color: #1b470b;" @click='getEmployeesById(JSON.parse(JSON.stringify(cas)))' data-target='#editEmployeesModal' data-toggle='modal'></i></span>
 							<!-- <span><i class="fa-solid fa-list" style="color: #157cbc;" @click='getExpensesById(JSON.parse(JSON.stringify(expenses)));pageName="expensesDetails"'></i></span> -->
 						</td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>