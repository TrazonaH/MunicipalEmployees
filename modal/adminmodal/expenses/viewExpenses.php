 <div class="d-flex flex-column-fluid" v-if="pageName == 'viewExpenses'">
 	<!--begin::Container-->
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-10">
 				<h1 class="modal-title fs-5" id="staticBackdropLabel"><b>EXPENSES</b></h1>
 			</div>
 			<div class="col-2"><i class="fa-solid fa-plus " style="font-size:40px;padding-top:10px;" data-toggle='modal' data-target='#addExpensesModal'></i></div>
 		</div>
 		<div class="modal-body table-responsive ">
 			<table class="table table-bordered ">
 				<thead class="kt-table-thead text-body">
 					<tr>
 						<th class="kt-table-cell"><b>Expenses No.</b></th>
 						<th class="kt-table-cell text-center"><b>Expenses Name</b></th>
						 <th class="kt-table-cell text-center"><b>Description</b></th>
						 <th class="kt-table-cell text-center"><b>Quantity</b></th>
						 <th class="kt-table-cell text-center"><b>Unit</b></th>
 						<th class="kt-table-cell text-center"><b>Amount Paid</b></th>
 						<th class="kt-table-cell text-center"><b>Options</b></th>
 					</tr>
 				</thead>
 				<tbody class="kt-table-tbody text-dark table-group-divider">
 					<tr class="kt-table-row kt-table-row-level-0 text-info" v-for="expenses,index in expensess" v-if="expenses.status != 2">
 						<td class="kt-table-cell">{{ expenses.expenses_id }}</td>
 						<td class="kt-table-cell text-center">{{ expenses.expenses_name }}</td>
 						<td class="kt-table-cell text-center">{{ expenses.description }}</td>
						 <td class="kt-table-cell text-center">{{ expenses.quantity }}</td>
						 <td class="kt-table-cell text-center">{{ expenses.UoM}}</td>
						 <td class="kt-table-cell text-center">{{ expenses.total_amount_paid }}</td>
 						<td class="kt-table-cell text-center">
 							<span><i class="fa-solid fa-pen-to-square" style="color: #1b470b;" @click='getExpensesById(JSON.parse(JSON.stringify(expenses)))' data-target='#editMainModal' data-toggle='modal'></i></span>
 							<span><i class="fa-solid fa-list" style="color: #157cbc;" @click='getExpensesById(JSON.parse(JSON.stringify(expenses)));pageName="expensesDetails"'></i></span>
 						</td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>