<div class="d-flex flex-column-fluid" v-if="pageName == 'archiveProducts'">
	<!--begin::Container-->
	<div class="container-fluid">
		<a href="index.php">
			<i class="fa-solid fa-home fa-2xl"></i>
		</a>
		<h3 class="modal-title fs-5" style="font-family: 'Times New Roman', Times, serif;" id="staticBackdropLabel"><b>DELETED PRODUCTS</b></h3>
		<div class="modal-body table-responsive">
			<table class="table table-bordered ">
				<thead class="kt-table-thead text-body">
					<tr>
						<th class="kt-table-cell"><b>No.</b></th>
						<th class="kt-table-cell"><b>Product Name</b></th>
						<th class="kt-table-cell"><b>Price</b></th>
						<th class="kt-table-cell"><b>Category</b></th>
						<th class="kt-table-cell"><b>Product Type</b></th>
						<th class="kt-table-cell"><b>Options</b></th>

					</tr>
				</thead>
				<tbody class="kt-table-tbody text-dark">
					<tr class="kt-table-row kt-table-row-level-0" v-for="product,index in products" v-if="product.status == 2">
						<td class="kt-table-cell">{{ product.product_id }}</td>
						<td class="kt-table-cell">{{ product.product_name }}</td>
						<td class="kt-table-cell">{{ product.selling_price }}</td>
						<td class="kt-table-cell" ><div v-for="category in categories" v-if="category.cat_id == product.cat_id">{{ category.category_name }}</div></td>
						<td class="kt-table-cell">{{ product.type }}</td>
						<td class="kt-table-cell">
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