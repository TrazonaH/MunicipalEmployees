<div class="d-flex flex-column-fluid" v-if="pageName == 'loyaltyB'">
 	<!--begin::Container-->
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-10">
 				<h1 class="modal-title fs-5 text-success" id="staticBackdropLabel"><b>Loyalty Bonus This Year</b></h1>
 			</div>
			 <div class="col-2"><button class="btn btn-success" @click="exportToExcelLoyalty">Export to Excel</button></div>
 		</div>
 		<div class="modal-body table-responsive ">
 			<table class="table table-bordered ">
 				<thead class="kt-table-thead text-body">
 					<tr>
					 <th class="kt-table-cell text-center"><b>No.</b></th>
 						<th class="kt-table-cell text-center"><b>Employee Name</b></th>
 						<th class="kt-table-cell text-center"><b>Years</b></th>
 					</tr>
 				</thead>
 				<tbody class="kt-table-tbody text-dark table-group-divider">
 					<tr class="kt-table-row kt-table-row-level-0 text-info" v-for="loyaltyBunos,index in loyaltyBunoses" >
					 	<td class="kt-table-cell text-center">{{ index+1 }}</td>
 						<td class="kt-table-cell text-center">{{ loyaltyBunos.lname }}, {{ loyaltyBunos.fname }} {{ loyaltyBunos.mname }}.</td>
						 <td class="kt-table-cell text-center">{{ loyaltyBunos.years }} years</td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div> 