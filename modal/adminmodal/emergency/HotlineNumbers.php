

<div class="d-flex flex-column-fluid" v-if="pageName == 'emergency'" >
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-5">
				<h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel"><b>Emergency Hotline Numbers</b></h1>
 			</div>
 			<div class="col-2"><button data-toggle='modal' data-target='#addEmergencyModal' class="btn btn-success">Add New</button></div>
 		</div>
 		<div class="modal-body table-responsive ">
 			<table class="table table-bordered " ref="viewEmployee">
 				<thead class="kt-table-thead text-body">   
 					<tr>
 						<th class="kt-table-cell text-danger text-center"><b>Department</b></th>
						<th class="kt-table-cell text-danger text-center"><b>Hotline Numbers</b></th>
                        <th class="kt-table-cell text-danger text-center"><b>Options</b></th>
 					</tr>
 				</thead>
 				<tbody class="kt-table-tbody text-dark table-group-divider">
                     <tr class="kt-table-row kt-table-row-level-0 text-info" v-for="emergency,index in emergencies">
 						<td class="kt-table-cell text-center">{{ emergency.department }}</td>
						 <td class="kt-table-cell text-center">{{ emergency.number }}</td>
 						<td class="kt-table-cell text-center">
						 	<span><i class="fa-solid fa-trash" style="color: red;" @click='deleteEmergency(emergency.em_id)'></i></span>
 							<span><i class="fa-solid fa-pen-to-square" style="color: #1b470b;" @click='getEmergencyById(JSON.parse(JSON.stringify(emergency)))' data-target='#editEmergencyModal' data-toggle='modal'></i></span>
 						
						</td>
 					</tr>
 				</tbody>
 			</table>
			<!-- <button onclick="exportToExcel()">Export to Excel</button> -->
 		</div>
 	</div>
 </div>