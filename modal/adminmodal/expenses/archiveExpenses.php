<div class="d-flex flex-column-fluid" v-if="pageName == 'archiveExpenses'">
	<!--begin::Container-->
	<div class="container-fluid">
		<a href="index.php">
			<i class="fa-solid fa-house fa-2xl"></i>
		</a>
		<h3 class="modal-title fs-5" id="staticBackdropLabel"><b>EXPENSES</b></h3>
		<div class="modal-body table-responsive">
			<table class="table ">
				<thead class="kt-table-thead text-body">
					<tr>
						<th class="kt-table-cell"><b>Expenses No.</b></th>
						<th class="kt-table-cell"><b>Expenses Name</b></th>
						<th class="kt-table-cell"><b>Received Date</b></th>
						<th class="kt-table-cell"><b>Received By</b></th>
						<th class="kt-table-cell"><b>Total Amount Paid</b></th>
						<th class="kt-table-cell"><b>Date Updated</b></th>
						<th class="kt-table-cell"><b>Options</b></th>
					</tr>
				</thead>
				<tbody class="kt-table-tbody text-dark table-group-divider">
					<tr class="kt-table-row kt-table-row-level-0" v-for="expenses,index in expensess" v-if="expenses.status == 2">
						<td class="kt-table-cell">{{ expenses.expenses_id }}</td>
						<td class="kt-table-cell">{{ expenses.supply_name }}</td>
						<td class="kt-table-cell">{{ expenses.received_date }}</td>
						<td class="kt-table-cell">{{ expenses.received_by }}</td>
						<td class="kt-table-cell">{{ expenses.total_amount_paid }}</td>
						<td class="kt-table-cell">{{ expenses.date_updated }}</td>
						<td class="kt-table-cell text-center">
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