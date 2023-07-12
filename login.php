<?php
session_start();
if (isset($_SESSION['userid']) && $_SESSION['role'] != 4) {
    header('location:index.php');
} else if (isset($_SESSION['userid']) && $_SESSION['role'] == 4) {
    header('location:pos.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/login/css/bootstrap.min.css">
</head>

<body style=' background: url("officials.png") no-repeat fixed center; height: 100%; background-size: cover;'>
    <div class="content">
        <div class="container" style="padding-left: 1000px;">
            <!-- <div class="row" style="padding-top: 10px; ">
                <div class="col-md-5 center " style="padding: 10px; background-color:white; border-radius: 15px; margin:auto;width:50%">
                    <div class="row justify-content-center" style="padding: 10px" id="app">
                        <div>
                            <form @submit='login'>
                                <input class="form-control form-control-lg inputfields" type="text" name="uname" placeholder="Username" required ></br>
                                <input class="form-control form-control-lg inputfields" type="password" name="pword" placeholder="Password" required ></br>
                                <div>
                                </div>
                                <div class="form-button">
                                    <button id="submit" type="submit" class="btn btn-primary form-control form-control-lg"  >Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <script src="assets/login/js/jquery.min.js"></script>
    <script src="assets/login/js/popper.min.js"></script>
    <script src="assets/login/js/bootstrap.min.js"></script>
    <script src="assets/login/js/main.js"></script>
    <script src="assets/js/axios/axios.js"></script>
    <script src="assets/js/vue/vue.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {},
            methods: {
                login: function(e) {
                    e.preventDefault();
                    const data = new FormData(e.currentTarget);
                    data.append('fn', 'login');
                    axios.post('api/user_api.php', data)
                        .then(function(r) {
                            console.log('rdata', r.data);
                            if (r.data == 1) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Username not Found!',
                                })
                            } else if (r.data == 'branch') {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Login Successfully!',
                                    showConfirmButton: false,
                                    timer: 0
                                });
                                window.location.href = 'creatingSession.php';

                            } else if (r.data == 'admin') {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Login Successfully!',
                                    showConfirmButton: false,
                                    timer: 0
                                })
                                window.location.href = 'index.php';

                            } else if (r.data == 'manager') {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Login Successfully!',
                                    showConfirmButton: false,
                                    timer: 0
                                })
                                window.location.href = 'index.php';

                            } else if (r.data == 3) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'password not right!',
                                    position: 'center',
                                })
                            } else if (r.data == 4) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Account has been locked. Please contact your admin.',
                                    position: 'center',
                                })
                            } else if (r.data == 5) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Account has been deactivated. Please contact your admin.',
                                    position: 'center',
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'You Cant Access Dashboard',
                                    position: 'top',
                                })
                            }
                        })
                }
            }
        })
    </script>
</body>

</html>