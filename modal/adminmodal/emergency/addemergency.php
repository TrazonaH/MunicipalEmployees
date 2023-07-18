<div class="modal " id="addEmergencyModal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b>NEW EMPLOYEE</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="addEmergency">
          <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="fname" class="col-form-label"><b>
                        <h3>Department:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="department" placeholder="Department:" required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="lname" class="col-form-label"><b>
                        <h3>Hotline Number:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="number" placeholder="Contact Number:" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary " id="closeaddEmployeesModal" name="closeaddEmployeesModal" data-dismiss="modal">CANCEL</button>
              <button type="submit" class="btn btn-primary">ADD</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>