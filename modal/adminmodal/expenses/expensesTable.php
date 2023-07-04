<div class="modal" id="MonthlyexpensesModal" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title fs-5" id="staticBackdropLabel"><b>EXPENSES</b></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive ">
				<table class="table table-bordered ">
					<thead class="kt-table-thead text-body">
						<tr>
							<th class="kt-table-cell"><b>Expenses No.</b></th>
							<th class="kt-table-cell"><b>Expenses Name</b></th>
							<th class="kt-table-cell"><b>Date Updated</b></th>
							<th class="kt-table-cell"><b>Options</b></th>
						</tr>
					</thead>
					<tbody class="kt-table-tbody text-dark table-group-divider">
						<tr class="kt-table-row kt-table-row-level-0 text-success" v-for='expenses,index in AllExpenses'>
							<td class="kt-table-cell">{{ index+1 }}</td>
							<td class="kt-table-cell">{{ expenses.date_month }}</td>
							<td class="kt-table-cell">{{ expenses.total_amount_month }}</td>
							<td class="kt-table-cell text-center">
								<div class="btn-group">
									<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action
									</button>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item edit" href="javascript:void(0)" @click='getExpensesById(JSON.parse(JSON.stringify(expenses)))' data-target='#editMainModal' data-toggle='modal' data-dismiss="modal">
												<h5>Edit</h5>
											</a></li>
										<li><a class="dropdown-item details" href="javascript:void(0)" @click='getExpensesById(JSON.parse(JSON.stringify(expenses)))' data-target='#expensesdetailModal' data-toggle='modal' data-dismiss='modal'>
												<h5>Details</h5>
											</a></li>
									</ul>

								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>