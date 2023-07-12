<div class="modal " id="editEmployeesModal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b>UPDATE EMPLOYEE ( <span style="color: green" >{{employee.fname}}</span>)</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="editEmployee">
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
                        <input type="text" class="form-control form-control-lg" name="efname" v-model="employee.fname" placeholder="First Name:" required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="lname" class="col-form-label"><b>
                        <h3>Last Name:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="elname" v-model="employee.lname" placeholder="Last Name:" required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="m_initial" class="col-form-label"><b>
                        <h3>Middle Initial:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="em_initial" v-model="employee.m_i" placeholder="Middle Initial:" >
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="col-form-label" for="img"><b>Upload Product Image:</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload Image: </span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="eimg" name="eimg" @change='view_image'>
                                        <label class="custom-file-label" for="eimg"></label>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>


            <!-- <div class="row">
                <div class="col">
                    <input type="number" name="id" v-model="employee.emp_id" hidden>
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="efname" class="col-form-label"><b>
                        <h3>First Name:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="efname" v-model="employee.fname" placeholder="First Name:" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="elname" class="col-form-label"><b>
                        <h3>Last Name:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="elname" v-model="employee.lname" placeholder="Last Name:" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="em_initial" class="col-form-label"><b>
                        <h3>Middle Initial:</h3>
                        </b></label>
                        <input type="text" class="form-control form-control-lg" name="em_initial" v-model="employee.m_i" placeholder="Middle Initial:" >
                    </div>
                </div>
            </div><br> -->
            <br>
            <div class="row">
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="egender" class="col-form-label">
                            <b><h3>Gender:</h3></b>
                        </label>
                        <select name='egender' class="form-control form-control-lg" v-model="employee.gender" >
                            <option value="">Select Gender...</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="eaddress" class="col-form-label"><b>
                        <h3>Address:</h3>
                        </b></label>
                        <div class="col"><input type="text" class="form-control form-control-lg" name="eaddress" v-model="employee.address" placeholder="Address:" ></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="ebirthdate" class="col-form-label"><b>
                        <h3>Birthdate:</h3>
                        </b></label>
                        <div class="col"><input type="date" class="form-control form-control-lg" name="ebirthdate" v-model="employee.birthdate" placeholder="Birthdate:" ></div>
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="eid_number" class="col-form-label">
                            <b><h3>ID Number:</h3></b>
                        </label>
                        <div class="row">
                            <div class="col"><input type="number" class="form-control form-control-lg" name="eid_number" v-model="employee.id_number" placeholder="ID Number:" ></div>
                            <div class="col"><input type="number" class="form-control form-control-lg" name="endNum" v-model="employee.endNum" ></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="edate_employed" class="col-form-label"><b>
                        <h3>Date of Employment:</h3>
                        </b></label>
                        <div class="col"><input type="date" class="form-control form-control-lg" name="edate_employed" v-model="employee.date_of_employment" placeholder="Date of Employment:" ></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="edepartment" class="col-form-label"><b>
                        <h3>Department:</h3>
                        </b></label>
                        <div class="col">
                            <select name='edepartment' class="form-control form-control-lg" v-model="employee.department" >
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
                                <option value="Day Care Teacher">Day Care Teachers</option>
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

            <div class="row">
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="rank" class="col-form-label"><b>
                        <h3>Positon/Rank:</h3>
                        </b></label>
                        <div class="col"><input type="text" class="form-control form-control-lg" name="rank" v-model="employee.rank"  ></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="egender" class="col-form-label">
                            <b><h3>Type of Employee:</h3></b>
                        </label>
                        
                        <div class="col">
                            <select name='type' class="form-control form-control-lg" v-model="employee.type" >
                                <option value="">Select Type...</option>
                                <option value="1">COS</option>
                                <option value="2">JOB ORDER</option>
                            </select>    
                            <!-- <input type="text" class="form-control form-control-lg" name="type" v-model="employee.type"  > -->
                        </div>
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="egender" class="col-form-label">
                            <b><h3>Date of Regularity:</h3></b>
                        </label>
                        <div class="col"><input type="date" class="form-control form-control-lg" name="regularity" v-model="employee.regularity"  ></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mx-sm-3 mb-2">
                    <label for="eaddress" class="col-form-label"><b>
                        <h3>Date of Casual:</h3>
                        </b></label>
                        <div class="col"><input type="date" class="form-control form-control-lg" name="casualty" v-model="employee.casualty"  ></div>
                    </div>
                </div>
            </div><br>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary " id="closeeditEmployeesModal" name="closeeditEmployeesModal" data-dismiss="modal">CANCEL</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>