<div class="modal" id="checkReceived" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b>CONFIRMATION</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="receivedPurchase">
          <div class="container">
            <div class="row">
              <div v-if="purchase.type == 1">
                <div v-for="product in products" v-if="product.product_id == purchase.item_id" style="color: green">
                  <h1>{{product.product_name}}</h1>
                </div>
              </div>
              <div v-if="purchase.type == 2">
                <div v-for="supply in supplies" v-if="supply.supply_id == purchase.item_id" style="color: green">
                  <h1>{{supply.supply_name}}</h1>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-3"><label for="received_qty" class="col-form-label"><b>
                    <h1>Quantity:</h1>
                  </b></label></div>
              <div class="col-4"><input readonly type="number" class="form-control form-control-lg" v-model="purchase.quantity_whole"></div>
              <div class="col-4">
                <div v-for="UoM in UoMs" v-if="UoM.UoM_id == purchase.unit_whole">
                  <h1>{{UoM.abbreviation}}</h1>
                </div>
              </div>
            </div>
            <hr><br><br>
            <h3>Received Quantities</h3><br>
            <div class="row">
              <div class="col-3">
                <label for="received_qty" class="col-form-label">
                  <b><h1>Quantity:</h1></b>
                </label>
              </div>
              <div class="col-4"><input type="number" class="form-control form-control-lg" name="received_qty"></div>
              <div class="col-4">
                <div v-for="UoM in UoMs" v-if="UoM.UoM_id == purchase.unit_whole" :value="UoM.UoM_id" >
                  <h1>{{UoM.abbreviation}}</h1>
                  <input type="number" name="received_unit" v-model="purchase.unit_whole" hidden>
                </div>
              </div>
            </div>

            <div class="row">
              <div col-3>
                <label for="received_qty" class="col-form-label">
                  <b><h1>Received By:</h1></b>
                </label>
              </div>
              <div col-3>
                <select name='received_by' class="form-control form-control-lg" required>
	                <option value="">Purchased by...</option>
	                <option :value="user.userid" v-for="user in users">{{user.fname}} {{user.lname}}</option>
	              </select>
              </div>
              <div col-3>
                <label for="received_qty" class="col-form-label">
                  <b><h1>Password:</h1></b>
                </label>
              </div>
              <div col-3>
              <input type="password" class="form-control form-control-lg" name="pass">
              </div>
            </div>
          </div>
          <input type="number" name="purchase_id" v-model="purchase.purchase_id" hidden>
          <input type="date" name="received_date" value="<?php echo date('Y-m-d') ?>" hidden>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="closeCheckModal" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Process</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>