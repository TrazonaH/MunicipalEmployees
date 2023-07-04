<div class="modal" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-label mb-0 font-weight-bold text-body">EDIT PRODUCT</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit="editProduct">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4" style="background-color: gray;">
                                <img :src='img' class="img-fluid" alt="image" style=" height: 250px; width:400px; padding-top:10px">
                            </div>
                            <div class="col-md-8">
                                <input type='hidden' class="form-control" v-model='product.product_id' name='product_id'>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="eproduct_name" class="col-form-label"><b>Product Name:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="eproduct_name" v-model="product.product_name" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="ecat_name"><b>Category:</b></label>
                                    <select name='ecat_name' class="form-control form-control-lg" required>
                                        <option selected v-for="category in categories" v-if='product.cat_id == category.cat_id'>{{category.category_name}}</option>
                                        <option v-for="category in categories">{{category.category_name}}</option>
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="etype"><b>Product Type:</b></label>
                                    <select name='etype' v-model="product.type" class="form-control form-control-lg" required>
                                        <option selected>Choose Type...</option>
                                        <option value="consumable">Consumable</option>
                                        <option value="storable">Storable</option>
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="date" class="form-control form-control-lg" name="updated_date" value="<?php echo date("Y-m-d"); ?>" hidden>
                                </div>
                            </div>
                        </div>
                        <hr style="width:100%;text-align:left;margin-left:0">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="eimg"><b>Upload Product Image:</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload Image: </span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="eimg" name="eimg" @change='view_image'>
                                        <label class="custom-file-label" for="eimg"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="price" class="col-form-label"><b>Selling Price:</b></label>
                                    <input type="number" class="form-control form-control-lg" name="eprice" required v-model="product.selling_price">
                                </div>
                            </div>
                        </div>
                        <hr style="width:100%;text-align:left;margin-left:0">
                        <label class="col-form-label">Supplies that is needed with its measurements.</label>
                        <div class="row table-responsive">
                            <table class="table table-bordered">
                                <thead class="kt-table-thead text-body">
                                    <tr>
                                        <th class="kt-table-cell  text-center"><b>No.</b></th>
                                        <th class="kt-table-cell  text-center"><b>Supply Name</b></th>
                                        <th class="kt-table-cell  text-center"><b>Quantity</b></th>
                                        <th class="kt-table-cell text-center"><b>Unit</b></th>
                                        <th class="kt-table-cell  text-center"><b>Options</b></th>
                                    </tr>
                                </thead>
                                <tbody class="kt-table-tbody">
                                    <tr class="kt-table-row kt-table-row-level-0 text-success" v-for="added_supply,index in addedSupplies" v-if="added_supply.product_id == product.product_id && added_supply.status != 2">

                                        <td class="kt-table-cell  text-center">{{ index+1 }}</td>
                                        <td class="kt-table-cell  text-center" v-for='supply in supplies' v-if='added_supply.supply_id == supply.supply_id'>{{ supply.supply_name }}</td>
                                        <td class="kt-table-cell  text-center"><div>{{added_supply.quantity}}</div>
                                            <!-- <div class="row">
                                                <div class="col">
                                                    From: <input type="number" style="width: 70px;" v-model="added_supply.quantity">
                                                </div>
                                                <div class="col">
                                                    To: <input type="number" style="width: 70px;" v-model="supquantity">
                                                </div>
                                            </div> -->
                                        </td>
                                        <td class="kt-table-cell  text-center">{{added_supply.UoM}} </td>
                                        <td class="kt-table-cell text-white text-center">
                                            <input type="number" name="ps_id" v-model="added_supply.ps_id" hidden>
                                            <span><i class="fa-solid fa-pen-to-square" style="color: #1b470b;" @click='getSupplyAdded(JSON.parse(JSON.stringify(added_supply)))' class="btn btn-success" data-toggle="modal" data-target="#specificSupply" data-dismiss="modal"></i></span>
                                            <span><i class="fa-solid fa-trash" style="color: #ff0a0a;" @click='deleteSupplyAdded(added_supply.ps_id)'></i></span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <br>
                        <label for="">Add New Supplies</label>
                        <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2 ">
                                            <select name='supply_id' class="form-control form-control-lg " @change="selectSupply(sup_ids)" v-model="sup_ids" required>
                                                <!-- <option selected>Select Supply</option> -->
                                                <option :value='supply.supply_id' v-for="supply in supplies">{{supply.supply_name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control form-control-lg" required name="quantity" v-model="sup_qty" placeholder="Quantity" step="any">
                                    </div>
                                    <div class="col-md-3">
                                        <h3 name="unit"></h3>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" @click='supplyNeeded(sup_ids,sup_qty)' class="btn btn-primary">ADD</button>
                                    </div>
                                </div>
                        <br>
                        <label for="">Newly Added Supplies</label>
                        <div class="row table-responsive">
                            <table class="table table-bordered table-dark">
                                <thead class="kt-table-thead text-body">
                                    <tr>
                                        <th class="kt-table-cell text-white text-center"><b>No.</b></th>
                                        <th class="kt-table-cell text-white text-center"><b>Supply Name</b></th>
                                        <th class="kt-table-cell text-white text-center"><b>Quantity</b></th>
                                        <th class="kt-table-cell text-white text-center"><b>UoM</b></th>
                                        <th class="kt-table-cell text-white text-center"><b>Options</b></th>
                                    </tr>
                                </thead>
                                <tbody class="kt-table-tbody">
                                    <tr class="kt-table-row kt-table-row-level-0 text-success" v-for="supply_need,index in productSupplies">
                                        <td class="kt-table-cell text-white text-center">{{ index+1 }}</td>
                                        <td class="kt-table-cell text-white text-center" v-for='supply in supplies' v-if='supply_need.need_ids == supply.supply_id'>{{ supply.supply_name }}</td>
                                        <td class="kt-table-cell text-white text-center">{{ supply_need.need_qty }}</td>
                                        <td class="kt-table-cell text-white text-center">{{ supply_need.need_uom }}</td>
                                        <td class="kt-table-cell text-white text-center">
                                            <button type="button" class="btn btn-danger" @click="deleteSupplyNeeded(index)">DELETE</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="closeeditproductModal" data-target='#viewProductModal' data-toggle='modal' data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>