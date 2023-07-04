<div class="modal" id="editMainModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel">UPDATE:</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="editMain">
          <input type="number" v-model='expenses.expenses_id' name="expenses_id" hidden>
          <label for="expenses_name" class="col-form-label">
            <h3>Expenses name:</h3>
          </label>
          <input type="text" class="form-control form-control-lg" v-model='expenses.expenses_name' name="expenses_name"><br>
          <label for="UoM" class="col-form-label">
            <h3>UoM:</h3>
          </label>
          <select name='eUoM' class="form-control form-control-lg" v-model='expenses.UoM' required>
            <option value="">Choose Unit...</option>
            <option :value="UoM.abbreviation" v-for="UoM in UoMs">{{UoM.abbreviation}}</option>
          </select>
          <!-- <input type="text" class="form-control form-control-lg" v-model='expenses.UoM' name="eUoM"> -->
          <input type="date" name="updated_date" value="<?php echo date("Y-m-d"); ?>" hidden><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id='closeEditMain' data-toggle="modal" data-target="#expensesModal" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>