<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel">Edit Product</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form @submit="addProduct">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4" style="background-color: gray;">
                        <img :src='img' class="img-fluid" alt="image" width="200" height="500" style="padding-top: 30px; padding-left: 20px; padding-right: 10px;">
                    </div>
                    <div class="col-md-8">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type='hidden' class="form-control" v-model='product.product_id' name='product_id'>
                            <label for="eproduct_name" class="col-form-label"><b>Product Name:</b></label>
                            <input type="text" class="form-control form-control-lg"  name="eproduct_name" v-model="product.product_name">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="col-form-label" for="ecat_name"><b>Category:</b></label>
                            <select name='ecat_name' class="form-control form-control-lg" >
                                <!-- <option v-if='product.cat_id == categories.cat_id'>{{categories.category_name}}</option> -->
                                <option selected v-for="category in categories" v-if='product.cat_id == category.cat_id'>{{category.category_name}}</option>
                                <option v-for="category in categories" >{{category.category_name}}</option>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="col-form-label" for="etype"><b>Product Type:</b></label>
                            <select name='etype' v-model="product.type" class="form-control form-control-lg" >
                                <option selected>Choose Type...</option>
                                <option value="consumable">Consumable</option>
                                <option value="storable"s>Storable</option>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                          <!-- <input type="date" class="form-control form-control-lg"  name="created_date" value="<?php echo date("Y-m-d"); ?>" hidden > -->
                        </div>
                    </div>
                </div>
                <hr style="width:100%;text-align:left;margin-left:0">
                <div class="row">
                    <div class="col-md-4">
                    <!-- <h3 class="card-label mb-0 font-weight-bold text-body">Measurement</h3> -->
                        <label class="col-form-label" for="eimg"><b>Upload Product Image:</b></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload Image: </span>
                            </div>
                        <div class="custom-file">
                            <input type="file" class="form-control-file" id="eimg" name="eimg" @change='view_insert_image'>
                            <label class="custom-file-label" for="img"></label>
                        </div>
                </div>
                    </div>
                    <div class="col-md-8">
                    <!-- <h3 class="card-label mb-0 font-weight-bold text-body">Pricing</h3> -->
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="eprice" class="col-form-label"><b>Selling Price:</b></label>
                            <input type="number" class="form-control form-control-lg" name="eprice" v-model="product.selling_price">
                        </div>
                    </div>
                </div>
                <hr style="width:100%;text-align:left;margin-left:0">
                <label class="col-form-label" for="img"><i>Select all the supplies that is needed and provide measurements.</i></label>
                <div class="row overflow-auto" style="max-width: 100%; max-height: 200px;" >
                    <table class="table">
                        <thead>
                            <tr>
                            <th></th>
                            <th class="card-label mb-0 font-weight-bold text-body">Supplies</th>
                            <th class="card-label mb-0 font-weight-bold text-body">Quantity</th>
                            <th class="card-label mb-0 font-weight-bold text-body">Unit of Measure</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr   class="table-active" v-for="supply,index in supplies">
                                <td  style="border-radius: 10px;">
                                    <input type="checkbox" name='esupply_name' v-if='product.product_id == supply.product_id' class="form-control" @click='supplyNeeded(supply.supply_id,index)' >
                                    <!-- <label class="form-check-label" for="supply_name" >{{supply.supply_name}}</label> -->
                            
                                </td>
                                <td style="border-radius: 10px;" class="card-label mb-0 font-weight-bold text-body">{{supply.supply_name}}</td>
                                <td style="border-radius: 10px;"><input type="number" class="form-control form-control-lg" name="quantity"></td>
                                <td style="border-radius: 10px;">
                                <select id="cat_name" name='cat_name' class="form-control form-control-lg" >
                                    <option>Select ...</option>
                                    <option v-for="UoM in UoMs">{{UoM.abbreviation}}</option>
                                </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" name="closeproductModal"  data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </form>
      </div>
      
    </div>
  </div>