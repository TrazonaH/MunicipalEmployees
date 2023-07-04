<div class="modal" id="supliesProductEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel">BRANCH ( <i style='color: orange'>{{product.product_name}} </i> )</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="transportSupplies">
            <input type="number" name="branch_id" v-model="branch.branch_id" hidden>
            <input type="date" class="form-control form-control-lg"  name="date_transported" value="<?php echo date("Y-m-d"); ?>" hidden >
            <label class="col-form-label" for="img"><h3>Supplies</h3></label>
            <div class="container">
                <div class="row table-responsive">
                    <table class="table table-bordered">
                        <thead class="kt-table-thead text-body">
                            <tr>
                                <th class="kt-table-cell  text-center"><b>No.</b></th>
                                <th class="kt-table-cell  text-center"><b>Supply Name</b></th>
                                <th class="kt-table-cell  text-center"><b>Quantity</b></th>
                                <th class="kt-table-cell  text-center"><b>UoM</b></th>
                                <th class="kt-table-cell  text-center"><b>Options</b></th>
                            </tr>
                        </thead>
                        <tbody class="kt-table-tbody">
                            <tr class="kt-table-row kt-table-row-level-0 text-success" v-for="supply_need,index in productSupplies">
                                <td class="kt-table-cell  text-center">{{ index+1 }}</td>
                                <td class="kt-table-cell  text-center" v-for='supply in supplies' v-if='supply_need.need_ids == supply.supply_id'>{{ supply.supply_name }}</td>
                                <td class="kt-table-cell  text-center">{{ supply_need.need_qty }}</td>
                                <td class="kt-table-cell  text-center" v-for="UoM in UoMs" v-if='supply_need.need_uom == UoM.UoM_id'>{{ UoM.abbreviation }}</td>
                                <td class="kt-table-cell  text-center">
                                <button class="btn btn-danger">DELETE</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <label>Kindly select all the supplies for transport and provide measurements.</label>
                <div class="row">
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-2 " style="border: 1px solid gray; border-radius: 10px;">
                            <select name='supply_id' class="form-control form-control-lg " v-model='sup_ids' required>
                                <option :value='supply.supply_id' v-for="supply in supplies">{{supply.supply_name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control form-control-lg" v-model='sup_qty' required name="quantity" placeholder="Quantity" style="border: 1px solid gray;">
                    </div>  
                    <div class="col-md-3">
                        <div class="form-group mb-2" style="border: 1px solid gray;  border-radius: 10px;">
                            <select  name='UoM' class="form-control form-control-lg" v-model='sup_uom' required>
                                <option :value='UoM.UoM_id' v-for="UoM in UoMs">{{UoM.abbreviation}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" @click='supplyNeeded' class="btn btn-primary">ADD</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-target='#editProductModal' data-toggle='modal' data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Process</button>
           </div>
        </form>
      </div>
      
    </div>
  </div>
</div>