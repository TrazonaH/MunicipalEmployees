

<div class="d-flex flex-column-fluid" v-if="pageName == 'viewEmployees'" >
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-10">
				<h1 class="modal-title fs-5 text-success" id="staticBackdropLabel"><b>REGULAR EMPLOYEES</b></h1>
 			</div>
			 <div class="col-2"><button class="btn btn-success" @click="exportToExcelRegular">Export to Excel</button></div>
			
 		</div>
 		<div class="modal-body table-responsive ">
 			<table class="table table-bordered " ref="viewEmployee">
 				<thead class="kt-table-thead text-body">
 					<tr>
 						<th class="kt-table-cell text-center"><b>No.</b></th>
						 <th class="kt-table-cell text-center"><b>Rank/Position</b></th>
 						<th class="kt-table-cell text-center"><b>First Name</b></th>
						 <th class="kt-table-cell text-center"><b>Last Name</b></th>
						 <th class="kt-table-cell text-center"><b>M.I.</b></th>
                         <th class="kt-table-cell text-center"><b>Gender</b></th>
                         <th class="kt-table-cell text-center"><b>ID  Number</b></th>
                         <th class="kt-table-cell text-center"><b>Birthdate</b></th>
                         <th class="kt-table-cell text-center"><b>Date of Employment</b></th>
						 <th class="kt-table-cell text-center"><b>Department</b></th>
                         <th class="kt-table-cell text-center"><b>Options</b></th>
 					</tr>
 				</thead>
 				<tbody class="kt-table-tbody text-dark table-group-divider">
                     <tr class="kt-table-row kt-table-row-level-0 text-info" v-for="regular,index in regulars">
 						<td class="kt-table-cell text-center">{{ index+1 }}</td>
						 <td class="kt-table-cell text-center">{{ regular.rank }}</td>
 						<td class="kt-table-cell text-center">{{ regular.fname }}</td>
 						<td class="kt-table-cell text-center">{{ regular.lname }}</td>
						<td class="kt-table-cell text-center">{{ regular.m_i }}</td>
                        <td class="kt-table-cell text-center">{{ regular.gender }}</td>
                        <td class="kt-table-cell text-center">{{ regular.id_number }} - {{regular.endNum}}</td>
                        <td class="kt-table-cell text-center">{{ regular.birthdate}}</td>
                        <td class="kt-table-cell text-center">{{ regular.date_of_employment }}</td>
						<td class="kt-table-cell text-center">{{ regular.department }}</td>
						<!-- <td class="kt-table-cell text-center">
							<div v-if="regular.type == 1">COS</div>
							<div v-if="regular.type == 2">JOB ORDER</div>
							<div v-if="regular.type == 3">REGULAR</div>
							<div v-if="regular.type == 4">CASUAL</div>
							<div v-if="regular.type == 5">CONSULTANT</div>
						</td> -->
 						<td class="kt-table-cell text-center">
						 	<span><i class="fa-solid fa-trash" style="color: red;" @click='deleteEmployee(regular.emp_id)'></i></span>
 							<span><i class="fa-solid fa-pen-to-square" style="color: #1b470b;" @click='getEmployeesById(JSON.parse(JSON.stringify(regular)))' data-target='#editEmployeesModal' data-toggle='modal'></i></span>
 							<!-- <span><i class="fa-solid fa-list" style="color: #157cbc;" @click='getExpensesById(JSON.parse(JSON.stringify(expenses)));pageName="expensesDetails"'></i></span>
							 <span><i class="fa-solid fa-arrow-up-right-dots" style="color: #41d219;" @click='displayIncrement(employee.emp_id)' data-toggle="modal" data-target="#increment"></i></span> -->
 						
						</td>
 					</tr>
 				</tbody>
 			</table>
			<!-- <button @click="exportToExcel">Export to Excel</button> -->
 		</div>
 	</div>
 </div>