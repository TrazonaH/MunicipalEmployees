<div class="modal" id="PurchaseProductSupplies" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-xl">
	        <div class="modal-content">
	            <div class='row'>
	                <div class="col-10">
	                    <h1 class="modal-title" style="font-family: 'Times New Roman', Times, serif; padding:20px;" id="exampleModalLabel">Purchase (Old Item? <a href="#"  data-dismiss="modal" data-toggle="modal" data-target="#PurchaseProducts" style="color: green">click here)</a></h1>
	                </div>
	            </div>
	            </button>
	            <div class="container">
	                <form  @submit="newpurchaseItem">
	                    <div class="container-fluid">
	                        <div class="row" style="border: 1px gray">
	                            <div class="col-1">
	                                <label for="item" class="col-form-label">
	                                    <h3>Item Name:</h3>
	                                </label>
	                            </div>
	                            <div class="col-5">
									<input type="text" name="item" class="form-control form-control-md">
	                            </div>
	                            <div class="col-2">
	                                <label for="type" class="col-form-label">
	                                    <h3>Type:</h3>
	                                </label>
	                            </div>
	                            <div class="col-4">
									<select name='type' class="form-control form-control-lg" required>
	                                    <option value="">Choose...</option>
	                                    <option value=1>Storable</option>
										<option value=2>Consumable</option>
	                                </select>
	                            </div>
	                        </div><br>

	                        <div class="row">
	                            <div class="col-">
	                                <label for="quantity_whole" class="col-form-label">
	                                    <h3>Quantity:</h3>
	                                </label>
	                            </div>
	                            <div class="col-2">
	                                <input type="number" class="form-control form-control-md" name="quantity_whole">
	                            </div>
	                            <div class="col-1">
	                                <label for="" class="col-form-label">
	                                    <h3>Unit:</h3>
	                                </label>
	                            </div>
	                            <div class="col-1">
	                                <select name='UoM1' class="form-control form-control-lg" required>
	                                    <option value="">Choose Unit...</option>
	                                    <option :value="UoM.UoM_id" v-for="UoM in UoMs">{{UoM.abbreviation}}</option>
	                                </select>
	                            </div>
	                            <h5 class="col-form-label"><i>(Simplied per Unit)</i></h5>
	                            <div class="col-">
	                                <label for="quantity_simplified" class="col-form-label">
	                                    <h3>Quantity:</h3>
	                                </label>
	                            </div>
	                            <div class="col-2">
	                                <input type="text" class="form-control form-control-md" name="quantity_simplified">
	                            </div>
	                            <div class="col-1">
	                                <label for="" class="col-form-label">
	                                    <h3>Unit:</h3>
	                                </label>
	                            </div>
	                            <div class="col-1">
	                                <select name='UoM2' class="form-control form-control-lg" required>
	                                    <option value="">Choose Unit...</option>
	                                    <option :value="UoM.UoM_id" v-for="UoM in UoMs">{{UoM.abbreviation}}</option>
	                                </select>
	                            </div>
	                        </div><br>

	                        <div class="row">
	                            <div class="col-2">
	                                <label for="acquisition_cost" class="col-form-label">
	                                    <h3>Acquisition Cost:</h3><i>(by pieces)</i>
	                                </label>
	                            </div>
	                            <div class="col-4">
	                                <input type="number" name="acquisition_cost" class="form-control form-control-md">
	                            </div>
	                            <div class="col-2">
	                                <label for="total_amount" class="col-form-label">
	                                    <h3>Total Amount Paid:</h3>
	                                </label>
	                            </div>
	                            <div class="col-4">
	                                <input type="number" name="total_amount" class="form-control">
	                            </div>
	                        </div><br>
	                        <hr style="width:100%;text-align:left;margin-left:0">
	                        <div class="row">
	                            <div class="col-2">
	                                <label for="purchased_by" class="col-form-label">
	                                    <h3>Purchased By:</h3>
	                                </label>
	                            </div>
	                            <div class="col-4">
	                                <select name='purchased_by' class="form-control form-control-lg" required>
	                                    <option value="">Purchased by...</option>
	                                    <option :value="user.userid" v-for="user in users">{{user.fname}} {{user.lname}}</option>
	                                </select>
	                            </div>
	                            <div class="col-2">
	                                <label for="pass" class="col-form-label">
	                                    <h3>Password:</h3>
	                                </label>
	                            </div>
	                            <div class="col-4">
	                                <input type="password" name="pass" class="form-control">
	                            </div>
	                        </div><br>
	                        <hr style="width:100%;text-align:left;margin-left:0">
	                        <div class="row">
	                            <div class="col-2">
	                                <label for="bound_to" class="col-form-label">
	                                    <h3>Bound to:</h3>
	                                </label>
	                            </div>
	                            <div class="col-4">
	                                <select name='bound_to' class="form-control form-control-lg" required>
	                                    <option value="">Branch...</option>
										<option value="0">Comissary</option>
	                                    <option :value="branch.branch_id" v-for="branch in branches">{{branch.branch_name}}</option>
	                                </select>
	                            </div>
								<div class="col-2">
	                                <label for="supplier_id" class="col-form-label">
	                                    <h3>Supplier:</h3>
	                                </label>
	                            </div>
	                            <div class="col-4">
									<select name='supplier_id' class="form-control form-control-lg" required>
	                                    <option value="">Supplier...</option>
	                                    <option :value="user.userid" v-for="user in users">{{user.lname}}</option>
	                                </select>
	                            </div>
	                        </div><br>
							<input type="date" name="created_date" value="<?php echo date("Y-m-d"); ?>">
	                        <!-- </div> -->
	                        <br>
	                        <div class="modal-footer">
	                            <!-- <a href="javascript:void(0)" @click="pageName = 'products'" hidden id="closeAdd">Close</a> -->
	                            <button type="button" class="btn btn-secondary" id="closepurModal" data-dismiss="modal">Close</button>
	                            <button type="submit" class="btn btn-primary">Add Product</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>