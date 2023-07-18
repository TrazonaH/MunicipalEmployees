<div class="modal " id="editEmergencyModal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b>NEW EMPLOYEE</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="editEmergency">
          <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="fname" class="col-form-label"><b>
                        <h3>Department:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="edepartment" v-model="emergency.department" required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="lname" class="col-form-label"><b>
                        <h3>Hotline Number:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="enumber" v-model="emergency.number" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary " id="closeeditEmergencyModal" name="closeeditEmergencyModal" data-dismiss="modal">CANCEL</button>
              <button type="submit" class="btn btn-primary">ADD</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>