<div class="modal" id="addtoSupply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b>ADD TO SUPPLY</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="addToSupply">
          <div class="container-fluid">
            <h3 class="modal-title fs-5" v-for="expenses in expensess" v-if="expenses_stock.expense_id == expenses.expenses_id" style="color:green"><b>
                <h2>{{expenses.expenses_name}}</h2>
              </b></h3>
            <!-- <h5><b><h2>{{expenses_stock.description}}</h2></b></h5> -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group mx-sm-3 mb-2">
                  <input type="number" name="id" v-model="expenses.expenses_id" hidden>
                  <input type="number" name="exp_stock_id" v-model="expenses_stock.exp_stock_id" hidden>
                  <input type="text" class="form-control form-control-lg" name="eexpense_name" :value="expenses.expenses_name" v-for="expenses in expensess" v-if="expenses_stock.expense_id == expenses.expenses_id" hidden>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="edescription" class="col-form-label"><b>
                      <h3>Description:</h3>
                    </b></label>
                  <input type="text" class="form-control form-control-lg" name="edescription" v-model='expenses_stock.description' readonly>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="equantity" class="col-form-label"><b>
                      <h3>Quantity:</h3>
                    </b></label>
                  <input type="number" class="form-control form-control-lg" name="equantity" v-model='expenses_stock.quantity' readonly>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="UoM" class="col-form-label"><b>
                      <h3>Unit Of Measure:</h3>
                    </b></label>
                  <select name='UoM' class="form-control form-control-lg" v-model='expenses_stock.UoM' required>
                    <option value="">Select Unit</option>
                    <option :value="UoM.abbreviation" v-for="UoM in UoMs">{{UoM.abbreviation}}</option>
                  </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="expiration_date" class="col-form-label"><b>
                      <h3>Expiration Date:</h3>
                    </b></label>
                  <input type="date" class="form-control form-control-lg" name="expiration_date" required>
                  <input type="date" name="created_date" value="<?php echo date("Y-m-d"); ?>" hidden>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" name="closeExpensesModal" id="closeExpensesModal" data-target='#expensesdetailModal' data-toggle='modal' data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">ADD TO SUPPLY</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>