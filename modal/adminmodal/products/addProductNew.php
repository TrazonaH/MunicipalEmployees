<div class="modal" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class='row'>
                <div class="col-10">
                    <h1 class="modal-title" style="font-family: 'Times New Roman', Times, serif; padding:20px;" id="exampleModalLabel">NEW PRODUCT</h1>
                </div>
            </div>
            </button>
            <div class="container">
                <form ref="addproduct" @submit="addProduct">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4" style="background-color: #EAEAEA;">
                                <img :src='img' class="img-fluid center" alt="image" style=" height: 250px; width:400px; padding-top:10px">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="product_name" class="col-form-label"><b>Product Name:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="product_name" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="cat_name"><b>Category:</b></label>
                                    <select name='cat_name' class="form-control form-control-lg" required>
                                        <option value="">Choose Category...</option>
                                        <option :value="category.cat_id" v-for="category in categories">{{category.category_name}}</option>
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="type"><b>Product Type:</b></label>
                                    <select name='type' id="productType" @change="typeChecker()" class="form-control form-control-lg" required>
                                        <option value="0">Choose Type...</option>
                                        <option value="1">Consumable</option>
                                        <option value="2">Storable</option>
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="date" class="form-control form-control-lg" name="created_date" value="<?php echo date("Y-m-d"); ?>" hidden>
                                </div>
                            </div>
                        </div>
                        <hr style="width:100%;text-align:left;margin-left:0">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="img"><b>Upload Product Image:</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload Image: </span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="img" name="img" @change='view_insert_image'>
                                        <label class="custom-file-label" for="img"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="price" class="col-form-label"><b>Selling Price:</b></label>
                                    <input type="number" class="form-control form-control-lg" name="price" required>
                                </div>
                            </div>
                        </div>
                        <hr style="width:100%;text-align:left;margin-left:0">
                        <label v-if="productType == '1'" class="col-form-label" for="img">Supplies that is needed with its measurements.</label>
                        <div class="row table-responsive" v-if="productType == '1'">
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
                        <label v-if="productType == '1'">Kindly select all the needed supplies and provide measurements.</label>
                        <div class="row" v-if="productType == '1'">
                            <div class="col-md-4">
                                <label class="col-form-label">Supply</label>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label">Quantity</label>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label">Unit of Measure</label>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <div class="row" v-if="productType == '1'">
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
                        <!-- </div> -->
                        <br>
                        <div class="modal-footer">
                            <!-- <a href="javascript:void(0)" @click="pageName = 'products'" hidden id="closeAdd">Close</a> -->
                            <button type="button" class="btn btn-secondary" id="closeaddproductModal" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>