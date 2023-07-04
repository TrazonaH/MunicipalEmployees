<div class="modal" id="updateStockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b>NEW EXPENSES</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="UpdateExpenses">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mx-sm-3 mb-2">
                <label for="expense_name" class="col-form-label"><b><h3>Expenses Name:</h3></b></label>
                <select name='expense_name' class="form-control form-control-lg" required >
                  <option value="">Choose From the expenses...</option>
                  <option :value="expenses.expenses_name" v-for="expenses in expensess">{{ expenses.expenses_name }}</option>
                </select>
              </div>
              <div class="form-group mx-sm-3 mb-2">
              <label for="description" class="col-form-label"><b><h3>Description:</h3></b></label>
                <input type="text" class="form-control form-control-lg"  name="description" >
              </div>
              
              <div class="form-group mx-sm-3 mb-2">
                <label for="purchase_by" class="col-form-label"><b><h3>Purchased By:</h3></b></label>
                <select name='purchase_by' class="form-control form-control-lg" required >
                  <option value="">Choose Employee...</option>
                  <option :value="user.userid" v-for="user in users">{{user.fname}} {{user.lname}}</option>
              </select>
              </div>
              <div class="form-group mx-sm-3 mb-2">
              <label for="supplier" class="col-form-label"><b><h3>Supplier:</h3></b></label>
                <input type="text" class="form-control form-control-lg"  name="supplier" >
              </div>
              <div class="form-group mx-sm-3 mb-2">
              <input type="date" class="form-control form-control-lg"  name="purchase_date" value="<?php echo date("Y-m-d"); ?>" hidden >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mx-sm-3 mb-2">
                <label for="quantity" class="col-form-label"><b><h3>Quantity:</h3></b></label>
                <input type="number" class="form-control form-control-lg"  name="quantity" v-model="ExpQuantity" required>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <label for="UoM" class="col-form-label"><b><h3>Unit Of Measure:</h3></b></label>
                <select name='UoM' class="form-control form-control-lg" required >
                <option value="">Select Unit</option>
                  <option :value="UoM.abbreviation" v-for="UoM in UoMs">{{UoM.abbreviation}}</option>
                </select>
              </div>
              <!-- <div class="form-group mx-sm-3 mb-2">
                <label for="acquisition_cost" class="col-form-label"><b><h3>Acquisition Cost:</h3> </b><i>(price per quantity)</i></label>
                <input type="number" class="form-control form-control-lg"  step="any" name="acquisition_cost" v-model="AcquiCost" >
              </div> -->
              <div class="form-group mx-sm-3 mb-2">
                <label for="total_amount_paid" class="col-form-label"><b><h3>Total Amount Paid:</h3></b></label>
                <input type="number" class="form-control form-control-lg" @change="TotalAmountPaid()"  name="total_amount_paid" v-model="TotalAmountPaid" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary closeaddExpensesModal" id="closeaddExpensesUpdateModal" data-target='#expensesModal'data-dismiss="modal">CANCEL</button>
            <button type="submit" class="btn btn-primary">ADD</button>
          </div>
        </div>
        </form>
      </div>
      
    </div>
  </div>    
</div>