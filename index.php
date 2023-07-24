<?php
include('header/adminheader.php');
?>
<!-- <div class="content d-flex flex-column flex-column-fluid" id="tc_content" style="margin-top: -70px;"> -->
<div id="tc_content" style="margin-top: -30px;">
	<!--begin::Entry-->
	<div class="row" style="padding: 10px;">
				<div class="col mx-2" style="background-color: yellow; border-radius: 10px;">
				<h1 class="text-center" style="background-color: white; margin-top: 5px; border-radius: 10px; padding: 5px;"><b>Regular</b></h1>
				<div class="text-center" style="background-color: white; margin-top: 5px; border-radius: 10px; padding: 5px;">
					<div style="font-size: 50px;">
					{{ regularCount }}
					</div>
					Employees
				</div>
				</div>
				<div class="col mx-2" style="background-color: red; border-radius: 10px;">
				<h1 class="text-center" style="background-color: white; margin-top: 5px; border-radius: 10px; padding: 5px;"><b>Casual</b></h1>
				<div class="text-center" style="background-color: white; margin-top: 5px; border-radius: 10px; padding: 5px;">
					<div style="font-size: 50px;">
					{{casualCount}}
					</div>Employees
				</div>
				</div>
				<div class="col mx-2" style="background-color: orange; border-radius: 10px;">
					<h1 class="text-center" style="background-color: white; margin-top: 5px; border-radius: 10px; padding: 5px;"><b>Job Order</b></h1>
					<div class="text-center" style="background-color: white; margin-top: 5px; border-radius: 10px; padding: 5px;">
						<div style="font-size: 50px;">
						{{joCount}}
						</div> Employees
					</div>
				</div>
				<div class="col mx-2" style="background-color: blue; border-radius: 10px;">
				<h1 class="text-center" style="background-color: white; margin-top: 5px; border-radius: 10px; padding: 5px;"><b>COS</b></h1>
				<div class="text-center" style="background-color: white; margin: 5px; border-radius: 10px; padding: 5px;">
					<div style="font-size: 50px;">
						{{cosCount}}
					</div>Employees
				</div>
				</div>
				<div class="col mx-2" style="background-color: green; border-radius: 10px;">
				<h1 class="text-center" style="background-color: white; margin-top: 5px; border-radius: 10px; padding: 5px;"><b>Consultant</b></h1>
				<div class="text-center" style="background-color: white; margin-top: 5px; border-radius: 10px; padding: 5px;">
					<div style="font-size: 50px;">
						{{consultantCount}}
					</div>Employees
				</div>
				</div>
			</div><br><br>
	<div class="d-flex flex-column-fluid" v-if="pageName == 'default'">
		<div class="container-fluid">
			
 		<div class="row">
		 <div class="col-2">
				<h1 class="modal-title fs-5 text-success" id="staticBackdropLabel"><b>EMPLOYEES</b></h1>
 			</div>
			<div class="col-4">
				<input type="text" v-model="searchQuery" class="form-control form-control-lg" name="address" placeholder="Search Employee:" >
			</div>
 			<div class="col-2"><button data-toggle='modal' data-target='#addEmployeesModal' class="btn btn-success">New Employee</button></div>
 		</div>
 		<div class="modal-body table-responsive ">
 			<table class="table table-bordered ">
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
						 <th class="kt-table-cell text-center"><b>Type of Employee</b></th>
                         <th class="kt-table-cell text-center"><b>Options</b></th>
 					</tr>
 				</thead>
 				<tbody class="kt-table-tbody text-dark table-group-divider">
 					<tr class="kt-table-row kt-table-row-level-0 text-info" v-for="employee,index in resultQuery" v-if="employee.status != 2">
 						<td class="kt-table-cell text-center">{{ index+1 }}</td>
						 <td class="kt-table-cell text-center">{{ employee.rank }}</td>
 						<td class="kt-table-cell text-center">{{ employee.fname }}</td>
 						<td class="kt-table-cell text-center">{{ employee.lname }}</td>
						<td class="kt-table-cell text-center">{{ employee.m_i }}</td>
                        <td class="kt-table-cell text-center">{{ employee.gender }}</td>
                        <td class="kt-table-cell text-center">{{ employee.id_number }} - {{ employee.endNum }}</td>
                        <td class="kt-table-cell text-center">{{ employee.birthdate}}</td>
                        <td class="kt-table-cell text-center">{{ employee.date_of_employment }}</td>
						<td class="kt-table-cell text-center">{{ employee.department }}</td>
						<td class="kt-table-cell text-center">
							<div v-if="employee.type == 1">COS</div>
							<div v-if="employee.type == 2">JOB ORDER</div>
							<div v-if="employee.type == 3">REGULAR</div>
							<div v-if="employee.type == 4">CASUAL</div>
							<div v-if="employee.type == 5">CONSULTANT</div>
							<!-- {{ employee.type }} -->
						</td>
 						<td class="kt-table-cell text-center">
						 	<span><i class="fa-solid fa-trash" style="color: red;" @click='deleteEmployee(employee.emp_id)'></i></span>
 							<span><i class="fa-solid fa-pen-to-square" style="color: #1b470b;" @click='getEmployeesById(JSON.parse(JSON.stringify(employee)))' data-target='#editEmployeesModal' data-toggle='modal'></i></span>
 							<span><i class="fa-solid fa-list" style="color: #157cbc;" @click='getEmployeesById(JSON.parse(JSON.stringify(employee)))' data-toggle="modal" data-target="#details"></i></span>
							<span><i class="fa-solid fa-arrow-up-right-dots" style="color: #41d219;" @click='displayIncrement(employee.emp_id)' data-toggle="modal" data-target="#increment"></i></span>
 						
						</td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>	
</div>
	<?php

	include('footer/adminfooter.php');
	?>