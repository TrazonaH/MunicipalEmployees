<?php
$con = new mysqli('localhost', 'root', '', 'coffeeshop');
$fn = $_POST['fn'];
session_start();
if (function_exists($fn)) {
    call_user_func($fn);
} else {
    echo 'Function Not Found!';
}

function register()
{
    global $con;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $role = $_POST['role'];
    $gender = $_POST['gender'];
    $con_num = $_POST['con_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $passwd = $_POST['passwd'];
    $username = $_POST['username'];
    // $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
    $pin = password_hash($_POST['pin'], PASSWORD_DEFAULT);
    $created_date = $_POST['created_date'];
    $dir = 'uploads/';
    $img = $dir . $_FILES['emp_img']["name"];
    move_uploaded_file($_FILES['emp_img']['tmp_name'], $img);
    $q = $con->prepare("SELECT * FROM users WHERE pin = ? AND uname = ?");
    $q->bind_param('ss', $pin, $username);
    $q->execute();
    $r = $q->get_result();
    if ($r->num_rows == 0) {
        $query = $con->prepare("INSERT INTO users(fname,lname,mname,role,gender,contact,email,address,uname,pin,emp_img,date_inserted,pword) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $query->bind_param('sssssisssssss', $fname, $lname, $mname, $role, $gender, $con_num, $email, $address, $username, $pin, $img, $created_date, $passwd);
        $query->execute();
        echo 1;
    } else if ($r->num_rows == 1) {
        echo 0;
    }
}

function login()
{
    global $con;
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];
    $query = $con->prepare("SELECT userid,uname,pword,branch_id,fname,lname,counterlock,role,status FROM users WHERE uname = ?");
    $query->bind_param("s", $uname);
    $query->execute();
    $query->store_result();
    if ($query->num_rows != 0) {
        $query->bind_result($userid, $username, $password, $branch_id, $fname, $lname, $counterlock, $role, $status);
        $query->fetch();
        if (password_verify($pword, $password)) {
            if ($counterlock >= 3) {
                echo 4; //Account Locked
                $status = $con->prepare('UPDATE users SET status = 2 WHERE uname = ?');
                $status->bind_param('s', $uname);
                $status->execute();
            } else if ($status == 0) {
                echo 5; //Account Deactivated   
            } else {
                // echo 2; //Login Successfully
                $_SESSION['userid'] = $userid;
                $_SESSION['fname'] = $fname;
                $_SESSION['role'] = $role;
                $_SESSION['branch_id'] = $branch_id;
                $_SESSION['lname'] = $lname;
                // $_SESSION['branch_id'] = 1;
                if ($role == 4) {
                    echo 'branch';
                } else if ($role == 2) {
                    echo 'manager';
                } elseif ($role == 1) {
                    echo 'admin';
                }
            }
        } else {
            echo 3; //Password Invalid
            $counterlock = $con->prepare('UPDATE users SET counterlock = counterlock + 1 WHERE uname = ?');
            $counterlock->bind_param('s', $uname);
            $counterlock->execute();
        }
    } else {
        echo 1; //User Not Found
    }
}

function logout()
{
    session_destroy();
    echo 1;
}

function displayUsers()
{
    global $con;
    $query = $con->prepare("SELECT * FROM users ");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}

function editEmployee()
{
    global $con;
    $userid = $_POST['userid'];
    $fname = $_POST['efname'];
    $lname = $_POST['elname'];
    $mname = $_POST['emname'];
    $role = $_POST['erole'];
    $gender = $_POST['egender'];
    $con_num = $_POST['econ_number'];
    $email = $_POST['eemail'];
    $address = $_POST['eaddress'];
    $username = $_POST['eusername'];
    $passwd = $_POST['epasswd'];
    $pin = $_POST['epin'];
    $updated_date = $_POST['updated_date'];
    $dir = 'uploads/';
    $img = $dir . $_FILES['eemp_img']["name"];
    move_uploaded_file($_FILES['eemp_img']['tmp_name'], $img);
    if ($img == "uploads/") {
        $query = $con->prepare('UPDATE users SET fname=?, lname=?, mname=?, role=?, gender=?, contact=?, email=?, address=?, uname=? , pword=?, pin=?, updated_date=? WHERE userid=?');
        $query->bind_param('sssisissssisi', $fname, $lname, $mname, $role, $gender, $con_num, $email, $address, $username, $passwd, $pin, $updated_date, $userid);
        $query->execute();
        echo 1;
    } else {
        $query = $con->prepare('UPDATE users SET fname=?, lname=?, mname=?, role=?, gender=?, contact=?, email=?, address=?, uname=? , pword=?, pin=?, updated_date=?, emp_img=? WHERE userid=?');
        $query->bind_param('sssisissssissi', $fname, $lname, $mname, $role, $gender, $con_num, $email, $address, $username, $passwd, $pin, $updated_date, $img, $userid);
        $query->execute();
        echo 2;
    }
}

function deleteUsers()
{
    global $con;
    $userid = $_POST['userid'];
    $status = 2;
    // $query = $con->prepare("DELETE FROM users WHERE userid =?");
    $query = $con->prepare('UPDATE users SET status=? WHERE userid = ?');
    $query->bind_param('ii', $status, $userid);
    $query->execute();
}

function deactivateUser()
{
    global $con;
    $userid = $_POST['userid'];
    $query = $con->prepare('UPDATE users SET status = 0 WHERE userid = ?');
    $query->bind_param('i', $userid);
    $query->execute();
}

function activateUser()
{
    global $con;
    $userid = $_POST['userid'];
    $query = $con->prepare('UPDATE users SET status = 1 WHERE userid =?');
    $query->bind_param('i', $userid);
    $query->execute();
}

function unlockUser()
{
    global $con;
    $userid = $_POST['userid'];
    $query = $con->prepare('UPDATE users SET counterlock = 0, status = 0 WHERE userid =?');
    $query->bind_param('i', $userid);
    $query->execute();
}

function makeAdmin()
{
    global $con;
    $userid = $_POST['userid'];
    $query = $con->prepare('UPDATE users SET role = 1 WHERE userid =?');
    $query->bind_param('i', $userid);
    $query->execute();
}

function makeUser()
{
    global $con;
    $userid = $_POST['userid'];
    $query = $con->prepare('UPDATE users SET role = 0 WHERE userid = ?');
    $query->bind_param('i', $userid);
    $query->execute();
}

function archiveEmployees()
{
    global $con;
    $status = 2;
    $query = $con->prepare("SELECT * FROM users WHERE status = ?");
    $query->bind_param('i', $status);
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function showActiveUsers()
{
    global $con;
    $query = $con->prepare("SELECT COUNT(case status when 1 then 0 else null end) as active, COUNT(status) as pro_len FROM users");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_assoc()) {
        $data[] = $r;
    }
    echo json_encode($data);
}

function posLogin()
{
    global $con;
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];
    $mode = $_POST['mode'];
    $query = $con->prepare("SELECT userid,uname,pword,fname,lname,counterlock,role,status FROM users WHERE uname = ?");
    $query->bind_param("s", $uname);
    $query->execute();
    $query->store_result();
    if ($query->num_rows != 0) {
        $query->bind_result($userid, $username, $password, $fname, $lname, $counterlock, $role, $status);
        $query->fetch();
        if (password_verify($pword, $password)) {
            if ($counterlock >= 3) {
                echo 4; //Account Locked
                $status = $con->prepare('UPDATE users SET status = 2 WHERE uname = ?');
                $status->bind_param('s', $uname);
                $status->execute();
            } else if ($status == 0) {
                echo 5; //Account Deactivated   
            } else {
                echo 2; //Login Successfully
                $_SESSION['userid'] = $userid;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                if ($mode == 1) {
                    $_SESSION['session_id'] = 0;
                    $_SESSION['branch_id'] = 0;
                }
            }
        } else {
            echo 3; //Password Invalid
            $counterlock = $con->prepare('UPDATE users SET counterlock = counterlock + 1 WHERE uname = ?');
            $counterlock->bind_param('s', $uname);
            $counterlock->execute();
        }
    } else {
        echo 1; //User Not Found
    }
}
