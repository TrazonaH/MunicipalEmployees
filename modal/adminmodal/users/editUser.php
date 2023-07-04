<div class="modal" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-label mb-0 font-weight-bold text-body">Update Employee</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit="editEmployee">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4" style="background-color: gray;">
                                <img :src='employee_img' class="img-fluid" alt="image" style=" height: 250px; width:400px; padding-top:10px">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mx-sm-3 mb-2">
                                    <!-- <input type="date" class="form-control form-control-lg"  name="updated_date" value="<?php echo date("Y-m-d"); ?>" hidden > -->
                                    <label for="lname" class="col-form-label"><b>Last Name:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="elname" v-model="user.lname">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="efname"><b>First Name:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="efname" v-model="user.fname">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="emname"><b>Middle Name:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="emname" v-model="user.mname">
                                </div>

                            </div>
                        </div>
                        <hr style="width:100%;text-align:left;margin-left:0">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="eemp_img"><b>Upload Employee Image:</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload Image: </span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" name="eemp_img" id="eemp_img" @change='view_employee_edit_img'>
                                        <label class="custom-file-label" for="eemp_img"></label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <!-- <h3 class="card-label mb-0 font-weight-bold text-body">Pricing</h3> -->
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="egender" class="col-form-label"><b>Gender:</b></label>
                                    <select name='egender' v-model="user.gender" class="form-control form-control-lg">
                                        <option selected>Choose Gender...</option>
                                        <option value="female">Female</option>
                                        <option value="male" s>Male</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr style="width:100%;text-align:left;margin-left:0">
                        <label class="col-form-label" for="img">
                            <h2>Other Important Information:</h2>
                        </label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="econ_number" class="col-form-label"><b>Contact Number:</b></label>
                                    <input type="number" class="form-control form-control-lg" v-model="user.contact" name="econ_number">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="eemail" class="col-form-label"><b>Email:</b></label>
                                    <input type="email" class="form-control form-control-lg" name="eemail" v-model="user.email">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="eaddress" class="col-form-label"><b>Address:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="eaddress" v-model="user.address">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="erole"><b>Role:</b></label>
                                    <select name='erole' v-model="user.role" class="form-control form-control-lg">
                                        <!-- <option selected>Choose Role...</option> -->
                                        <option :value="role.role_id" v-for="role in roles" v-if="user.role == role.role_id" selected>{{role.role_name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="eusername" class="col-form-label"><b>Username:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="eusername" v-model="user.uname">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="epasswd"><b>Password:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="epasswd" v-model="user.pword">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="epin"><b>Pin:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="epin" v-model="user.pin">
                                </div>

                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="date" class="form-control form-control-lg" name="updated_date" value="<?php echo date("Y-m-d"); ?>" hidden>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary closeaddModal" id="closeditUserModal" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>