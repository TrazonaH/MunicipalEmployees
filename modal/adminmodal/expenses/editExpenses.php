<div class="modal" id="editExpensesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b></b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="editExpenses">
        <div class="container-fluid">
          <h1  v-for="expenses in expensess" v-if="expenses.expenses_id == expenses_stock.expense_id"> UPDATE: <b style="color:green">{{ expenses.expenses_name }} </b><i>( {{ expenses_stock.purchase_date }} )</i></h1>
          <br>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mx-sm-3 mb-2">
                <input type="number" name="id" v-model="expenses_stock.exp_stock_id" hidden>
                <label for="equantity" class="col-form-label"><b><h3>Quantity:</h3></b></label>
                <input type="text" class="form-control form-control-lg" name="equantity" v-model='expenses_stock.quantity'>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <label for="eUoM" class="col-form-label"><b><h3>Unit:</h3></b></label>
                <select name='eUoM' class="form-control form-control-lg" v-model="expenses_stock.UoM" required >
                  <option value="">Select Unit</option>
                    <option :value="UoM.abbreviation" v-for="UoM in UoMs" >{{UoM.abbreviation}}</option>
                  </select>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <label for="etotal_amount_paid" class="col-form-label"><b><h3>Total Amount Paid:</h3></b></label>
                <input type="text" class="form-control form-control-lg" name="etotal_amount_paid" v-model='expenses_stock.total_amount_paid' readonly>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <label for="esupplier" class="col-form-label"><b><h3>Supplier:</h3></b></label>
                <input type="text" class="form-control form-control-lg" name="esupplier" v-model='expenses_stock.supplier'>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mx-sm-3 mb-2">
                <label for="epurchased_by" class="col-form-label"><b><h3>Purchased_by:</h3></b></label>
                <select name="epurchased_by" class="form-control form-control-lg" v-model='expenses_stock.purchased_by' required>
                  <option value="" >Choose Employee...</option>
                  <option :value="user.userid" v-for="user in users">{{user.fname}} {{user.lname}}</option>
                </select>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <label for="purchase_date" class="col-form-label"><b><h3>Purchase Date:</h3></b></label>
                <input type="text" class="form-control form-control-lg"  name="purchase_date" v-model='expenses_stock.purchase_date' readonly>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <label for="received_date" class="col-form-label"><b><h3>Received Date :</h3> </b></label>
                <input type="text" class="form-control form-control-lg"  name="received_date" v-model='expenses_stock.received_date' readonly>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <label for="date_updated" class="col-form-label"><b><h3>Updated_date:</h3></b></label>
                <input type="text" class="form-control form-control-lg"   name="date_updated" v-model='expenses_stock.date_updated' readonly>
              </div>

            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" name="closeeditExpensesModal" id="closeeditExpensesModal" data-target='#expensesdetailModal' data-toggle='modal' data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>


