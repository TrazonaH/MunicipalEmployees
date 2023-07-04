<?php
$con = new mysqli('localhost', 'root', '', 'coffeeshop');
$fn = $_POST['fn'];
session_start();
if (function_exists($fn)) {
    call_user_func($fn);
} else {
    echo 'Function Not Found!';
}
function displayExpenses()
{
    global $con;
    $query = $con->prepare("SELECT * FROM expenses");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
// function displayExpensesMonthly(){
//     global $con;
//     $query = $con->prepare("SELECT * FROM expenses_stocks");
//     $query->execute();
//     $result = $query->get_result();
//     $data = array();
//     while($r = $result->fetch_array()){
//          $data[]=$r;
//      }
//      echo json_encode($data);
// }
function addExpenses()
{
    global $con;
    $expense_name = strtoupper($_POST['expense_name']);
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $purchase_date = $_POST['purchase_date'];
    $UoM = $_POST['UoM'];
    $total_amount_paid = $_POST['total_amount_paid'];
    $purchase_by = $_POST['purchase_by'];
    $supplier = $_POST['supplier'];
    if ($quantity == 0 || $total_amount_paid == 0) {
        echo 2;
    } else {
        global $con;
        $query = $con->prepare('INSERT INTO expenses(expenses_name,description,purchase_date,quantity,total_amount_paid,purchased_by,supplier,UoM) VALUES(?,?,?,?,?,?,?,?)');
        $query->bind_param('sssiiiss', $expense_name, $description, $purchase_date, $quantity, $total_amount_paid, $purchase_by, $supplier, $UoM);
        $query->execute();
        echo 1;
    }
}
function checkExpenses($expenses_name)
{
    global $con;
    $query = $con->prepare("SELECT expenses_id FROM expenses WHERE expenses_name=?");
    $query->bind_param('s', $expenses_name);
    $query->execute();
    $query->store_result();
    $query->bind_result($expense_id);
    $query->fetch();
    return $expense_id;
}
function InsertExpenses($expenses_name, $purchase_date, $UoM)
{
    global $con;
    $query = $con->prepare("INSERT INTO expenses(expenses_name,date_updated,UoM) VALUES(?,?,?)");
    $query->bind_param('sss', $expenses_name, $purchase_date, $UoM);
    $query->execute();
    $expense_id = $query->insert_id;
    return $expense_id;
}
function InsertExpensesStock($expense_id, $description, $purchase_date, $quantity, $total_amount_paid, $purchase_by, $supplier, $UoM)
{
    global $con;
    $query = $con->prepare('INSERT INTO expensess(expense_id,description,purchase_date,quantity,total_amount_paid,purchased_by,supplier,UoM) VALUES(?,?,?,?,?,?,?,?)');
    $query->bind_param('issiiiss', $expense_id, $description, $purchase_date, $quantity, $total_amount_paid, $purchase_by, $supplier, $UoM);
    $query->execute();
}
function UpdateExpenses($date_updated, $expenses_id)
{
    global $con;
    $query = $con->prepare('UPDATE expenses SET date_updated=? WHERE expenses_id=?');
    $query->bind_param('si', $date_updated, $expenses_id);
    $query->execute();
}

function deleteExpenses()
{
    global $con;
    $id = $_POST['id'];
    $query = $con->prepare('UPDATE expenses SET status=2 WHERE id = ?');
    $query->bind_param('i', $id);
    $query->execute();
}
function editExpenses()
{
    global $con;
    $id = $_POST['id'];
    $quantity = $_POST['equantity'];
    $UoM = $_POST['eUoM'];
    $total_amount_paid = $_POST['etotal_amount_paid'];
    $supplier = $_POST['esupplier'];
    $purchased_by = $_POST['epurchased_by'];
    $updated_date = $_POST['updated_date'];

    $query = $con->prepare('UPDATE expenses SET UoM=?,total_amount_paid=?,supplier=?,purchased_by=?,date_updated=? WHERE exp_stock_id=?');
    $query->bind_param('isisisi', $quantity, $UoM, $total_amount_paid, $supplier, $purchased_by, $updated_date, $id);
    $query->execute();
    echo 1;
}
function editMain()
{
    global $con;
    $expenses_id = $_POST['expenses_id'];
    $expenses_name = $_POST['expenses_name'];
    $date_updated = $_POST['updated_date'];
    $UoM = $_POST['eUoM'];
    $query = $con->prepare("UPDATE expenses SET expenses_name=?,date_updated=?,UoM=? WHERE expenses_id=?");
    $query->bind_param('sssi', $expenses_name, $date_updated, $UoM, $expenses_id);
    $query->execute();
    $updateSuppliesStockUoM = $con->prepare('UPDATE supply_stock SET UoM = ? WHERE expense_id = ?');
    $updateSuppliesStockUoM->bind_param('si', $UoM, $expenses_id);
    $updateSuppliesStockUoM->execute();
    $getSupplyId = $con->prepare("SELECT supply_id FROM supply_stock WHERE expense_id=?");
    $getSupplyId->bind_param('i', $expenses_id);
    $getSupplyId->execute();
    $getSupplyId->store_result();
    $getSupplyId->bind_result($supply_id);
    $getSupplyId->fetch();
    // $supplyId = $supply_id;
    $updateBranchSuppliesUoM = $con->prepare('UPDATE branch_supplies SET UoM = ? WHERE supply_id = ?');
    $updateBranchSuppliesUoM->bind_param('si', $UoM, $supply_id);
    $updateBranchSuppliesUoM->execute();
    echo 1;
}
function ReceivedExpenses()
{
    global $con;
    $id = $_POST['id'];
    $received_date = $_POST['received_date'];
    $query = $con->prepare('UPDATE expensess SET status=1, received_date=? WHERE exp_stock_id = ?');
    $query->bind_param('si', $received_date, $id);
    $query->execute();
}
function UnReceivedExpenses()
{
    global $con;
    $id = $_POST['id'];
    $updated_date = $_POST['updated_date'];
    $query = $con->prepare('UPDATE expensess SET status=4, date_updated=? WHERE exp_stock_id = ?');
    $query->bind_param('si', $updated_date, $id);
    $query->execute();
}
function addToSupply()
{
    global $con;
    $expense_id = $_POST['id'];
    $exp_stock_id = $_POST['exp_stock_id'];
    $supply_name = $_POST['eexpense_name'];
    $description = $_POST['edescription'];
    $created_date = $_POST['created_date'];
    $expiration_date = $_POST['expiration_date'];
    $quantity = $_POST['equantity'];
    $UoM = $_POST['UoM'];
    $q = $con->prepare('SELECT supply_id from supplies where supply_name=?');
    $q->bind_param('s', $supply_name);
    $q->execute();
    $q->store_result();
    if ($q->num_rows == 0) {
        //if supply name doesnt exist
        $query = $con->prepare('INSERT INTO supplies (supply_name,description,created_date) VALUES(?,?,?)');
        $query->bind_param('sss', $supply_name, $description, $created_date);
        $query->execute();
        $supply_id = $query->insert_id;
        //insert into supply stock
        addSupplyStock($supply_id, $expense_id, $quantity, $UoM, $created_date, $expiration_date);
        //update status of the expenses stocks
        updateStatus($exp_stock_id);
        echo 1;
    } else {
        //if supply name exist automatic add to supplies stock
        $q->bind_result($supply_id);
        $q->fetch();
        addSupplyStock($supply_id, $expense_id, $quantity, $UoM, $created_date, $expiration_date);
        updateStatus($exp_stock_id);
        echo 1;
    }
}
function addSupplyStock($supply_id, $expense_id, $quantity, $UoM, $created_date, $expiration_date)
{
    global $con;
    $query = $con->prepare('INSERT INTO supply_stock (supply_id,expense_id,quantity,UoM,created_date,expiration_date) VALUES(?,?,?,?,?,?)');
    $query->bind_param('iiisss', $supply_id, $expense_id, $quantity, $UoM, $created_date, $expiration_date);
    $query->execute();
    // echo "supply added";
}
function updateStatus($id)
{
    global $con;
    $query = $con->prepare('UPDATE expensess SET status=3 WHERE exp_stock_id = ?');
    $query->bind_param('i', $id);
    $query->execute();
    // echo "change status";
}
function archiveExpenses()
{
    global $con;
    $status = 2;
    $query = $con->prepare("SELECT * FROM expenses WHERE status = ?");
    $query->bind_param('i', $status);
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function monthlyExpenses()
{
    global $con;
    $query = $con->prepare('select SUM(total_amount_paid) as total_expenses from expenses where MONTH(purchase_date) = MONTH(now()) and YEAR(purchase_date) = YEAR(now())');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_assoc()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function displayExpensesMonthly()
{
    global $con;
    $query = $con->prepare('SELECT YEAR(purchase_date) as year, date_format(purchase_date,"%m") as month,SUM(total_amount_paid) as total_amount_month, date_format(purchase_date,"%m/%d/%Y") as date_month FROM expensess WHERE YEAR(purchase_date) = YEAR(CURDATE()) GROUP BY month, year order by month');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_assoc()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function comparedLastExpenses()
{
    global $con;
    $query = $con->prepare('SELECT SUM(total_amount_paid) as last_month_expenses FROM expenses WHERE month(purchase_date) = month(NOW() - INTERVAL 1 MONTH)');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_assoc()) {
        $data[] = $r;
    }
    $query2 = $con->prepare('SELECT SUM(total_amount_paid) as current_month_expenses FROM expenses WHERE month(purchase_date) = month(NOW())');
    $query2->execute();
    $result2 = $query2->get_result();
    $data2 = array();
    while ($r2 = $result2->fetch_assoc()) {
        $data2[] = $r2;
    }
    $newdata[] = $data[0] + $data2[0];
    echo json_encode($newdata);
}
