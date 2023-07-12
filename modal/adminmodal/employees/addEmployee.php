<div class="modal " id="addEmployeesModal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b>NEW EMPLOYEE</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="addEmployee">
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-4" style="background-color: #EAEAEA;">
                    <img :src='emp_img' class="img-fluid center" alt="image" style=" height: 350px; width:400px; padding-top:10px">
                </div>
                <div class="col-md-8">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="fname" class="col-form-label"><b>
                        <h3>First Name:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="fname" placeholder="First Name:" required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="lname" class="col-form-label"><b>
                        <h3>Last Name:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="lname" placeholder="Last Name:" required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="m_initial" class="col-form-label"><b>
                        <h3>Middle Initial:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="m_initial" placeholder="Middle Initial:" >
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="col-form-label" for="img"><b>Upload Product Image:</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload Image: </span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="emp_img" name="emp_img" @change='view_insert_image'>
                                        <label class="custom-file-label" for="emp_img"></label>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
<!-- 
            <div class="row">
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="fname" class="col-form-label"><b>
                        <h3>First Name:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="fname" placeholder="First Name:" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="lname" class="col-form-label"><b>
                        <h3>Last Name:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="lname" placeholder="Last Name:" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="m_initial" class="col-form-label"><b>
                        <h3>Middle Initial:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="m_initial" placeholder="Middle Initial:" >
                    </div>
                </div>
            </div><br> -->

            <hr style="width:100%;text-align:left;margin-left:0">
            <div class="row">
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="gender" class="col-form-label">
                            <b><h3>Gender:</h3></b>
                        </label>
                        <select name='gender' class="form-control form-control-lg" >
                            <option value="">Select Gender...</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="address" class="col-form-label"><b>
                        <h3>Address:</h3>
                        </b></label>
                        <div class="col"><input type="text" class="form-control form-control-lg" name="address" placeholder="Address:" ></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="birthdate" class="col-form-label"><b>
                        <h3>Birthdate:</h3>
                        </b></label>
                        <div class="col"><input type="date" class="form-control form-control-lg" name="birthdate" placeholder="Birthdate:" ></div>
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="id_number" class="col-form-label">
                            <b><h3>ID Number:</h3></b>
                        </label>
                        <div class="col"><input type="text" class="form-control form-control-lg" name="id_number" placeholder="ID Number:" ></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="date_employed" class="col-form-label"><b>
                        <h3>Date of Employment:</h3>
                        </b></label>
                        <div class="col"><input type="date" class="form-control form-control-lg" name="date_employed" placeholder="Date of Employment:" ></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="department" class="col-form-label"><b>
                        <h3>Department:</h3>
                        </b></label>
                        <div class="col">
                            <select name='department' class="form-control form-control-lg" s>
                                <option value="">Select ...</option>
                                <option value="Mayors Office">Mayor's Office</option>
                                <option value="Tourism">Tourism</option>
                                <option value="HRMO">HR</option>
                                <option value="DRRM">DRRM</option>
                                <option value="Vice Mayors Office">Vice Mayor's SB Office</option>
                                <option value="MPDC">MPDC</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Budget">Budget</option>
                                <option value="DSWD">DSWD</option>
                                <option value="Assesor">Assesor</option>
                                <option value="Accounting">Accounting</option>
                                <option value="DA">DA</option>
                                <option value="LCR">LCR</option>
                                <option value="Treasury">Treasury</option>
                                <option value="RHU">RHU Personnel</option>
                                <option value="Public Market">Public Market</option>
                                <option value="Solid Waste">Solid Waste</option>
                                <option value="CTM">CTM</option>
                                <option value="Marine Watch">Marine Watch</option>
                                <option value="Roro Port">RORO Port</option>
                                <option value="CPC">CPC</option>
                                <option value="SB Member">SB Member</option>
                                <option value="Brgy. Captain">Brgy. Captain</option>
                                <option value="DEPED/CHED">Deped/Ched</option>
                                <option value="Police Personnel">Police Personnel</option>
                                <option value="BFP Personnel">BFP Personnel</option>
                                <option value="Day Care Teacher">Day Care Teacher</option>
                                <option value="Solo Parent Federation">Solo Parent Federation</option>
                                <option value="Senior Citizen">Senior Citizen</option>
                                <option value="CCCS">CCCS</option>
                                <option value="COMELEC">COMELEC</option>
                                <option value="DILG">DILG</option>
                                <option value="SK">SK</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div><br>

            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary closeaddEmployeesModal " id="closeaddEmployeesModal" name="closeaddEmployeesModal" data-dismiss="modal">CANCEL</button>
              <button type="submit" class="btn btn-primary">ADD</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>