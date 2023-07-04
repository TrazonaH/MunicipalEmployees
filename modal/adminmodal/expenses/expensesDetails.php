 <div class="d-flex flex-column-fluid" v-if="pageName == 'expensesDetails'">
 	<!--begin::Container-->
 	<div class="container-fluid">
 		<a href="javascript:void(0)" @click="pageName = 'viewExpenses'">
 			<i class="fa-solid fa-arrow-left fa-2xl"></i>
 		</a><br>
 		<h3 class="modal-title fs-5" id="staticBackdropLabel" style="color:green"><b>
 				<h2>{{expenses.expenses_name}}</h2>
 			</b></h3>
 		<div class="modal-body table-reponsive">
 			<table class="table table-bordered">
 				<thead class="kt-table-thead text-body">
 					<tr>
 						<!-- <th class="kt-table-cell"><b>No.</b></th> -->
 						<th class="kt-table-cell text-center"><b>Purchase Date</b></th>
 						<th class="kt-table-cell text-center"><b>Quantity</b></th>
 						<th class="kt-table-cell text-center"><b>Unit</b></th>
 						<th class="kt-table-cell text-center"><b>Total Amount Paid</b></th>
 						<th class="kt-table-cell text-center"><b>Received Date</b></th>
 						<th class="kt-table-cell text-center"><b>Updated Date</b></th>
 						<th class="kt-table-cell text-center"><b>Status</b></th>
 						<th class="kt-table-cell text-center"><b>Options</b></th>
 					</tr>
 				</thead>
 				<tbody class="kt-table-tbody text-dark table-group-divider">
 					<tr class="kt-table-row kt-table-row-level-0 text-info" v-for="expenses_stock,index in expenses_stocks" v-if="expenses_stock.expense_id == expenses.expenses_id ">
 						<!-- <td class="kt-table-cell">{{  }}</td> -->
 						<td class="kt-table-cell text-center">{{ expenses_stock.purchase_date }}</td>
 						<td class="kt-table-cell text-center">{{ expenses_stock.quantity }}</td>
 						<td class="kt-table-cell text-center">{{ expenses_stock.UoM }}</td>
 						<td class="kt-table-cell text-center">{{ expenses_stock.total_amount_paid }}</td>
 						<td class="kt-table-cell text-center">{{ expenses_stock.received_date }}</td>
 						<td class="kt-table-cell text-center">{{ expenses_stock.date_updated }}</td>
 						<td class="kt-table-cell text-center">
 							<h5 v-if="expenses_stock.status == 0" style="color: red">Pending</h5>
 							<h5 v-if="expenses_stock.status == 1" style="color: green">Received</h5>
 							<h5 v-if="expenses_stock.status == 4" style="color: orange">Canceled</h5>
 							<h5 v-if="expenses_stock.status == 3" style="color: blue">Added to Supply</h5>
 							<h5 v-if="expenses_stock.status == 5" style="color: violet">Retrieved</h5>
 						</td>
 						<td class="kt-table-cell text-center">
 							<span>
 								<i class="fa-solid fa-pen-to-square" style="color: #1b470b;" @click='getExpensesStockById(JSON.parse(JSON.stringify(expenses_stock)))' data-target='#editExpensesModal' data-toggle='modal' v-if='expenses_stock.status == 1 || expenses_stock.status == 5'></i>
 							</span>
 							<span>
 								<i class="fa-sharp fa-solid fa-trash" style="color: #df1a0c;" @click='deleteExpenses(expenses.id)' v-if='expenses_stock.status == 0'></i>
 							</span>
 							<span>
 								<i class="fa-sharp fa-solid fa-file-import" style="color: #1324a4;" @click='getExpensesStockById(JSON.parse(JSON.stringify(expenses_stock)))' v-if='expenses_stock.status == 1 || expenses_stock.status == 5' data-target='#addtoSupply' data-toggle='modal'></i>
 							</span>
 							<span>
 								<i class="fa-solid fa-check-to-slot" style="color: #29cd13;" @click='ReceivedExpenses(expenses_stock.exp_stock_id)' v-if='expenses_stock.status == 0' style="color: green" data-toggle="modal"></i>
 							</span>
 							<span>
 								<i class="fa-solid fa-triangle-exclamation" style="color: #f3f718;" @click='UnReceivedExpenses(expenses_stock.exp_stock_id)' v-if='expenses_stock.status == 0' style="color: orange" data-toggle='modal'></i>
 							</span>

 							<!-- <div class="btn-group">
 								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
 									Action
 								</button>
 								<ul class="dropdown-menu">
 									<li><a class="dropdown-item edit" href="#" @click='getExpensesStockById(JSON.parse(JSON.stringify(expenses_stock)))' data-target='#editExpensesModal' data-toggle='modal' v-if='expenses_stock.status == 1 || expenses_stock.status == 5' data-dismiss="modal">
 											<h5>Edit</h5>
 										</a></li>
 									<li><a class="dropdown-item delete" href="#" @click='deleteExpenses(expenses.id)' v-if='expenses_stock.status == 0 || expenses_stock.status == 1 || expenses_stock.status == 5'>
 											<h5>Delete</h5>
 										</a></li>
 									<li><a class="dropdown-item addSupply" href="#" @click='getExpensesStockById(JSON.parse(JSON.stringify(expenses_stock)))' v-if='expenses_stock.status == 1 || expenses_stock.status == 5' data-target='#addtoSupply' data-toggle='modal' data-dismiss='modal'>
 											<h5>Add to Supply</h5>
 										</a></li>
 									<li><a class="dropdown-item received" href="#" @click='ReceivedExpenses(expenses_stock.exp_stock_id)' v-if='expenses_stock.status == 0' style="color: green" data-toggle="modal">
 											<h5>Received</h5>
 										</a></li>
 									<li><a class="dropdown-item cancel" href="#" @click='UnReceivedExpenses(expenses_stock.exp_stock_id)' v-if='expenses_stock.status == 0' style="color: orange" data-toggle='modal'>
 											<h5>canceled</h5>
 										</a></li>
 								</ul>

 							</div> -->
 						</td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>