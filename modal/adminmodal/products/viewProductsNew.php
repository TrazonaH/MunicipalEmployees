	<div class="d-flex flex-column-fluid" v-if="pageName == 'products'">
		<!--begin::Container-->
		<div class="container-fluid">
			<span>
				<a href="index.php">
					<i class="fa-solid fa-house fa-2xl"></i>
				</a>
			</span>
			<div class="row">
				<div class="col-xl-4" style="margin:10px;">
					<select @change=" filterProductsbyCategory" class="form-control form-control-lg " name="product_category" id="product_category">
						<option selected value="0">Choose...</option>
						<option value="0">Show All Products</option>
						<option :value="category.cat_id" v-for="category in categories">{{category.category_name}}</option>
					</select>
				</div>
				<div class="col-5">
					<h1 class="modal-title" style="font-family: 'Times New Roman', Times, serif; padding-top:10px;" id="exampleModalLabel"><b> PRODUCTS</b></h1>
				</div>
				<div class="col-2">
					<i class="fa-solid fa-plus " style="font-size:40px;padding-top:10px;" data-toggle='modal' data-target='#addProductModal'></i>
				</div>
			</div>

			<div class="row">
				<div class="col-2" v-for="product,index in resultQuery" style="margin:10px;" v-if='product.status != 2'>
					<div class="productCard">
						<div @click='selectProducts(JSON.parse(JSON.stringify(product)))' class="productThumb" style='position: relative;'>
							<img class="img-fluid top-right" :src="'api/'+ product.img" alt="ix" style="border-radius: 10px; height: 150px; width:150px;">
							<div class='center' v-if='product.status ==0' style="margin-top: -120px; position: absolute;">
								<h3 style="text-align: center;width: 150px;height: 80px;background-color: yellow; padding-top: 10px;">NOT<br> AVAILABLE</h3>
							</div>
							<!-- style='position: absolute;top: 50%;left: 50%;color:black; transform: translate(-50%, -50%); background-color: yellow;' -->
						</div>
						<div class="EmployeeContent" id="productList" style="padding-left:10px; padding-top:10px">
							<span>
								<h3>{{product.product_name}}</h3>
							</span>
							<span><strong>{{"P "+product.selling_price+".00   "}}</strong></span>
							<span>
								<i v-if class="fa-solid fa-square-caret-down" data-toggle="dropdown" class=" dropdown-toggle"></i>
								<ul class="dropdown-menu">
									<li>
										<div class="dropdown-item edit" @click='getProductById(JSON.parse(JSON.stringify(product)))' data-target='#editProductModal' data-toggle='modal' data-dismiss="modal">
											<h5>Edit</h5>
										</div>
									</li>
									<li>
										<div class="dropdown-item delete" @click='deleteProduct(product.product_id)' style="color:red">
											<h5>Delete</h5>
										</div>
									</li>
									<li>
										<div class="dropdown-item makeAvailable" v-if='product.status == 0' @click='makeProductAvailable(product.product_id)' data-toggle="modal">
											<h5>Make Available</h5>
										</div>
									</li>
									<li>
										<div class="dropdown-item delete" v-if='product.status == 1' @click='makeProductNotAvailable(product.product_id)' data-toggle='modal'>
											<h5>Make Unavailable</h5>
										</div>
									</li>
								</ul>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>