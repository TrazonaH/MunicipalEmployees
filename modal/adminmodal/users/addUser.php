<div class="modal" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-label mb-0 font-weight-bold text-body">New Employee</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit="register">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4" style="background-color: gray;">
                                <img :src='employee_img' class="img-fluid" alt="image" style=" height: 250px; width:400px; padding-top:10px">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="date" class="form-control form-control-lg" name="created_date" value="<?php echo date("Y-m-d"); ?>" hidden>
                                    <label for="lname" class="col-form-label"><b>Last Name:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="lname" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="fname"><b>First Name:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="fname" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="mname"><b>Middle Name:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="mname" required>
                                </div>
                                <!-- <h3 class="card-label mb-0 font-weight-bold text-body">Pricing</h3> -->


                            </div>
                        </div>
                        <hr style="width:100%;text-align:left;margin-left:0">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="emp_img"><b>Upload Employee Image:</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload Image: </span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="emp_img" name="emp_img" @change='view_employee_image' required>
                                        <label class="custom-file-label" for="emp_img"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="gender" class="col-form-label"><b>Gender:</b></label>
                                    <select name='gender' class="form-control form-control-lg" required>
                                        <option value="">Choose Gender...</option>
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
                                    <label for="con_number" class="col-form-label"><b>Contact Number:</b></label>
                                    <input type="number" class="form-control form-control-lg" name="con_number" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="email" class="col-form-label"><b>Email:</b></label>
                                    <input type="email" class="form-control form-control-lg" name="email" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="address" class="col-form-label"><b>Address:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="address" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="role"><b>Role:</b></label>
                                    <select name='role' class="form-control form-control-lg" required>
                                        <option value="">Choose Role...</option>
                                        <option :value="role.role_id" v-for="role in roles">{{role.role_name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="username" class="col-form-label"><b>Username:</b></label>
                                    <input type="text" class="form-control form-control-lg" name="username" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="passwd"><b>Password:</b></label>
                                    <input type="password" class="form-control form-control-lg" name="passwd">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-form-label" for="pin"><b>Pin:</b></label>
                                    <input type="password" class="form-control form-control-lg" name="pin" required>
                                </div>

                            </div>
                        </div>
                        <!-- </div> -->
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary closeaddModal" name="closeaddModal" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>