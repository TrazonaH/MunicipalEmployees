<div class="d-flex flex-column-fluid" v-if="pageName == 'viewNextMonthly'">
 	<!--begin::Container-->
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-10">
 				<h1 class="modal-title fs-5 text-success" id="staticBackdropLabel"><b>Next Month Birthday Celebrants</b></h1>
 			</div>
 		</div>
 		<div class="modal-body table-responsive ">
 			<table class="table table-bordered ">
 				<thead class="kt-table-thead text-body">
 					<tr>
					 <th class="kt-table-cell text-center"><b>No.</b></th>
 						<th class="kt-table-cell text-center"><b>Date</b></th>
 						<th class="kt-table-cell text-center"><b>Employees</b></th>
						 <th class="kt-table-cell text-center"><b>Department</b></th>
 					</tr>
 				</thead>
 				<tbody class="kt-table-tbody text-dark table-group-divider">
 					<tr class="kt-table-row kt-table-row-level-0 text-info" v-for="NextMonth,index in NextMonths" >
					 	<td class="kt-table-cell text-center">{{ index+1 }}</td>
 						<td class="kt-table-cell text-center">{{ NextMonth.birthdate }}</td>
 						<td class="kt-table-cell text-center">{{ NextMonth.lname }}, {{ NextMonth.fname }} {{ NextMonth.m_i }}.</td>
						 <td class="kt-table-cell text-center">{{ NextMonth.department }}</td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div> 