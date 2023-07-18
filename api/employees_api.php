<?php
$con = new mysqli('localhost', 'root', '', 'salaryadjustment');
$fn = $_POST['fn'];
session_start();
if (function_exists($fn)) {
    call_user_func($fn);
} else {
    echo 'Function Not Found!';
}

function displayEmployees()
{
    global $con;
    $query = $con->prepare("SELECT * FROM employees");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function displaycos()
{
    global $con;
    $query = $con->prepare("SELECT * FROM employees WHERE type=1 AND status!=2");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function displayjo()
{
    global $con;
    $query = $con->prepare("SELECT * FROM employees WHERE type=2 AND status!=2  ORDER BY lname ASC");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function addEmployee(){
    echo "called";
    global $con;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $m_initial = $_POST['m_initial'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $id_number = $_POST['id_number'];
    $date_employed = $_POST['date_employed'];
    $department = $_POST['department'];
    $dir = 'uploads/';
    $img = $dir . $_FILES['emp_img']["name"];
    move_uploaded_file($_FILES['emp_img']['tmp_name'], $img);
    $query = $con->prepare('INSERT INTO employees(fname,lname,m_i,gender,id_number,birthdate,address,date_of_employment,department,img) VALUES(?,?,?,?,?,?,?,?,?,?)');
    $query->bind_param('ssssisssss', $fname, $lname, $m_initial, $gender, $id_number, $birthdate, $address, $date_employed,$department,$img);
    $query->execute();
    echo 1;
}
function deleteEmployee(){
    global $con;
    $emp_id = $_POST['employee_id'];
    $query = $con->prepare('UPDATE employees SET status=2 WHERE emp_id = ?');
    $query->bind_param('i', $emp_id);
    $query->execute();
}

function editEmployee()
{
    global $con;
    $id = $_POST['emp_id'];
    $fname = $_POST['efname'];
    $lname = $_POST['elname'];
    $m_initial = $_POST['em_initial'];
    $gender = $_POST['egender'];
    $address = $_POST['eaddress'];
    $birthdate = $_POST['ebirthdate'];
    $id_number = $_POST['eid_number'];
    $endNum = $_POST['endNum'];
    $date_employed = $_POST['edate_employed'];
    $department = $_POST['edepartment'];
    $regularity = $_POST['regularity'];
    $casualty = $_POST['casualty'];
    $rank = $_POST['rank'];
    $type = $_POST['type'];
    $dir = 'uploads/';
    $img = $dir . $_FILES["eimg"]["name"];
    move_uploaded_file($_FILES["eimg"]['tmp_name'], $img);

        if ($img != "uploads/") {
            $query = $con->prepare('UPDATE employees SET fname=?, lname=?, m_i=?, gender=?, id_number=?, endNum=?, birthdate=?, address=?, date_of_employment=?,department=?,img=?,regularity=?,casualty=?,rank=?,type=? WHERE emp_id=?');
            $query->bind_param('ssssiisssssssssi', $fname, $lname, $m_initial, $gender, $id_number, $endNum, $birthdate, $address, $date_employed, $department,$img,$regularity,$casualty,$rank,$type,$id);
            $query->execute();
        } else {
            $query = $con->prepare('UPDATE employees SET fname=?, lname=?, m_i=?, gender=?, id_number=?, endNum=?, birthdate=?, address=?, date_of_employment=?,department=?,regularity=?,casualty=?,rank=?,type=? WHERE emp_id=?');
            $query->bind_param('ssssiissssssssi', $fname, $lname, $m_initial, $gender, $id_number, $endNum, $birthdate, $address, $date_employed, $department,$regularity,$casualty,$rank,$type, $id);
            $query->execute();
        }
    }

function showMonthlyBirthdays(){
    global $con;
    $query = $con->prepare("SELECT * FROM employees 
    WHERE MONTH(birthdate) = MONTH(CURRENT_DATE()) 
    --   AND YEAR(birthdate) = YEAR(CURRENT_DATE()) 
    ORDER BY DAY(birthdate);");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
    
}

function showNextMonth(){
    global $con;
    $query = $con->prepare("SELECT * FROM employees 
    WHERE MONTH(birthdate) = MONTH(CURRENT_DATE()) + 1
    ORDER BY DAY(birthdate);");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);


}

function displayIncrement(){
    global $con;
    $data = array();
    $employee = $_POST['employee_id'];
    $yearNow =  date('Y');

    $query = $con->prepare("SELECT YEAR(regularity) as year, MONTH(regularity) as month, DAY(regularity) as day FROM employees WHERE emp_id = ?");
    $query->bind_param('i', $employee);
    $query->execute();
    $query->store_result();
    $query->bind_result( $year,$month,$day);
    $query->fetch();

    if ($year == 0000){
        echo 1;
    }else{
        $incremented = $year;
        while ($incremented <= $yearNow) {
    
            $data[] = ['year' => $incremented, 'month' => $month, 'day' => $day];
            $incremented += 3;
        }
    
    
        echo json_encode($data);
    }


}

function displayLoyaltyBonus(){
    global $con;
    $yearNow = date('Y');
    // $query = $con->prepare("SELECT lname,fname,m_i,YEAR(casualty) as year  FROM employees");
    $query = $con->prepare("SELECT *  FROM employees");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    $loyalty = array();
    for ($i=0; $i<count($data); $i++){
        $id = $data[$i]['emp_id'];
        $r = $con->prepare("SELECT YEAR(casualty) as year  FROM employees WHERE emp_id=?");
        $r->bind_param('i', $id);
        $r->execute();
        $r->store_result();
        $r->bind_result($year);
        $r->fetch();

        $ans = $yearNow - $year;
        if ($ans == 10 || $ans == 15 || $ans == 20 || $ans == 25 || $ans == 30  || $ans == 35  || $ans == 40  || $ans == 45 || $ans == 50  ){

            $loyalty[] = ['fname' => $data[$i]['fname'] , 'lname' => $data[$i]['lname'],'mname' => $data[$i]['m_i'] ,'years' => $ans];

        }

    }

    echo json_encode($loyalty);
}

function displaySalaryIncremented(){
    global $con;
    $yearNow = date('Y');
    // $query = $con->prepare("SELECT lname,fname,m_i,YEAR(casualty) as year  FROM employees");
    $query = $con->prepare("SELECT *  FROM employees");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    $incrementedEmp = array();

    
    for ($i=0; $i<count($data); $i++){
        $id = $data[$i]['emp_id'];
        $r = $con->prepare("SELECT YEAR(regularity) as year  FROM employees WHERE emp_id=?");
        $r->bind_param('i', $id);
        $r->execute();
        $r->store_result();
        $r->bind_result($year);
        $r->fetch();

        $incremented = $year;
        while ($incremented <= $yearNow) {
            if ($incremented == $yearNow){

                $incrementedEmp[] = ['fname' => $data[$i]['fname'] , 'lname' => $data[$i]['lname'],'mname' => $data[$i]['m_i'],'department' => $data[$i]['department']];
            }
            $incremented += 3;
        }


    }

    echo json_encode($incrementedEmp);
}


function addEmergency(){
    global $con;
    $department = $_POST['department'];
    $number = $_POST['number'];
    $query = $con->prepare('INSERT INTO emergencynum(department,number) VALUES(?,?)');
    $query->bind_param('ss', $department, $number);
    $query->execute();
    echo 1;
}
function displayEmergencyHotline(){
    global $con;
    $query = $con->prepare("SELECT * FROM emergencynum");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function deleteEmergency(){
    global $con;
    $em_id = $_POST['em_id'];
    $query = $con->prepare('UPDATE emergencynum SET status=2 WHERE em_id = ?');
    $query->bind_param('i', $em_id);
    $query->execute();
}
function editEmergency(){
    global $con;
    $id = $_POST['em_id'];
    $department = $_POST['edepartment'];
    $number = $_POST['enumber'];

    $query = $con->prepare('UPDATE emergencynum SET department=?, number=? WHERE em_id=?');
    $query->bind_param('ssi', $department, $number,$id);
    $query->execute();
}

?>