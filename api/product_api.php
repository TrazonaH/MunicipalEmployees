<?php
$con = new mysqli('localhost', 'root', '', 'coffeeshop');
$fn = $_POST['fn'];
session_start();
if (function_exists($fn)) {
    call_user_func($fn);
} else {
    echo 'Function Not Found!';
}

function displayActiveProducts()
{
    global $con;
    $query = $con->prepare("SELECT * FROM products");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
    // }
}
function displayProductSupplies()
{
    global $con;
    $query = $con->prepare("SELECT * FROM product_supplies");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function displayTopProducts()
{
    global $con;
    $query = $con->prepare("SELECT * FROM products WHERE status!=2 ORDER BY times_ordered DESC LIMIT 5");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function displayRecentProducts()
{
    global $con;
    $query = $con->prepare("SELECT * FROM products WHERE status!=2 ORDER BY product_id DESC");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}

function getProductById()
{
    global $con;
    echo "called";
    $product_id = $_POST['product_id'];
    $query = $con->prepare("SELECT * FROM products WHERE product_id=?");
    $query->bind_param('i', $product_id);
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    $q = $con->prepare("SELECT * FROM product_supplies WHERE product_id=?");
    $q->bind_param('i', $product_id);
    $q->execute();
    $res = $q->get_result();
    while ($re = $res->fetch_array()) {
        $data[] = $re;
    }
    echo "Data", $data;
    echo json_encode($data);
}

function addProduct()
{
    global $con;
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $cat_id = $_POST['cat_name'];
    $type = $_POST['type'];
    // $quantity = $_POST['quantity'];
    $quantity = 30;
    $created_date = $_POST['created_date'];
    $dir = 'uploads/';
    $img = $dir . $_FILES['img']["name"];
    $product_supply = json_decode($_POST['supply_name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $img);
    if ($img == 'uploads/') {
        echo 3;
    } else {
        if (sizeof($product_supply) == 0 && $type == 1) {
            //no product supplies included
            echo 2;
        } else {
            $q = $con->prepare("SELECT * FROM products WHERE product_name = ?");
            $q->bind_param('s', $product_name);
            $q->execute();
            $res = $q->get_result();
            if ($res->num_rows == 0) {
                $query = $con->prepare("INSERT INTO products(product_name,selling_price,cat_id,type,quantity,img,created_date) VALUES(?,?,?,?,?,?,?)");
                $query->bind_param('siisiss', $product_name, $price, $cat_id, $type, $quantity, $img, $created_date);
                $query->execute();
                $product_id = $query->insert_id;
                InsertSupply($product_supply, $product_id);
                echo 1;
            } else if ($res->num_rows == 1) {
                //product name already existed
                echo 0;
            }
        }
    }
}
function availableProducts()
{
    global $con;
    $query = $con->prepare("SELECT COUNT(case status when 1 then 0 else null end) as active, COUNT(status) as pro_len FROM products");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_assoc()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function InsertSupply($product_supply, $product_id)
{
    global $con;
    for ($i = 0; $i < sizeof($product_supply); $i++) {
        $supply_id = $product_supply[$i]->need_ids;
        $supply_uom = $product_supply[$i]->need_uom;
        $supply_qty = $product_supply[$i]->need_qty;
        $query = $con->prepare("INSERT INTO product_supplies(product_id,supply_id,quantity,UoM) VALUES(?,?,?,?)");
        $query->bind_param('iiis', $product_id, $supply_id, $supply_qty, $supply_uom);
        $query->execute();
    }
}
function deleteProduct()
{
    global $con;
    $product_id = $_POST['product_id'];
    $status = 2;
    // $query = $con->prepare('DELETE FROM products WHERE product_id = ?');
    $query = $con->prepare('UPDATE products SET status=? WHERE product_id = ?');
    $query->bind_param('ii', $status, $product_id);
    $query->execute();
}

function editProduct()
{
    global $con;
    $product_id = $_POST['product_id'];
    $product_name = $_POST['eproduct_name'];
    $type = $_POST['etype'];
    $cat_name = $_POST['ecat_name'];
    $updated_date = $_POST['updated_date'];
    $price = $_POST['eprice'];
    $product_supply = json_decode($_POST['supply_name']);
    $dir = "uploads/";
    $img = $dir . $_FILES["eimg"]["name"];
    move_uploaded_file($_FILES["eimg"]['tmp_name'], $img);
    $q = $con->prepare("SELECT * FROM products WHERE product_name = ?");
    $q->bind_param('s', $product_name);
    $q->execute();
    $res = $q->get_result();
    if ($product_name ==  '') {
        echo 0;
    } else if ($res->num_rows > 1) {
        echo 3;
    } else {
        if ($img != "uploads/") {
            $query = $con->prepare('UPDATE products SET product_name=?, selling_price=?,updated_date=?, type=?, cat_id=?, img=? WHERE product_id = ?');
            $query->bind_param('sissisi', $product_name, $price, $updated_date, $type, $cat_name, $img, $product_id);
            $query->execute();
            InsertSupply($product_supply, $product_id);
            echo 1;
        } else {
            $query = $con->prepare('UPDATE products SET product_name=?, selling_price=?,updated_date=?, type=?, cat_id=?  WHERE product_id = ?');
            $query->bind_param('sissii', $product_name, $price, $updated_date, $type, $cat_name, $product_id);
            $query->execute();
            InsertSupply($product_supply, $product_id);
            echo 2;
        }
    }
}

function makeProductAvailable()
{
    global $con;
    $product_id = $_POST['product_id'];
    $query = $con->prepare('UPDATE products SET status=1 WHERE product_id = ?');
    $query->bind_param('i', $product_id);
    $query->execute();
}

function makeProductNotAvailable()
{
    global $con;
    $product_id = $_POST['product_id'];
    $query = $con->prepare('UPDATE products SET status=0 WHERE product_id = ?');
    $query->bind_param('i', $product_id);
    $query->execute();
}

function showProducts()
{
    global $con;
    $cat_name = $_POST['category_name'];
    $query = $con->prepare("SELECT * FROM products WHERE cat_name = ?");
    $query->bind_param('s', $cat_name);
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_assoc()) {
        $data[] = $r;
    }
    echo json_encode($data);
}

function archiveProducts()
{
    global $con;
    $status = 2;
    $query = $con->prepare("SELECT * FROM products WHERE status = ?");
    $query->bind_param('i', $status);
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}

function filterProductsbyCategory()
{
    global $con;
    $product_category = $_POST['product_category'];

    if ($product_category != "show all" && $product_category != 0) {
        $query = $con->prepare("SELECT * FROM products WHERE cat_id = ?");
        $query->bind_param('i', $product_category);
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while ($r = $result->fetch_array()) {
            $data[] = $r;
        }
        echo json_encode($data);
    } else if ($product_category == 0 || $product_category == "show all") {
        // $query = $con->prepare("SELECT * FROM products");
        // $query->execute();
        // $result = $query->get_result();
        // $data = array();
        // while ($r = $result->fetch_array()) {
        //     $data[] = $r;
        // }
        // echo json_encode($data);
        return displayActiveProducts();
    }
}

function expiredProducts()
{
    global $con;
    $query = $con->prepare('SELECT supply_id FROM supplies WHERE expiration_date <= DATE_FORMAT(now(),"%Y-%m-%d")');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}

function editSupplyAdded()
{
    global $con;
    $ps_id = $_POST['ps_id'];
    $quantity = $_POST['quantity'];
    $query = $con->prepare('UPDATE product_supplies SET quantity=? WHERE ps_id = ?');
    $query->bind_param('ii', $quantity, $ps_id);
    $query->execute();
    echo 1;
}
function deleteSupplyAdded()
{
    global $con;
    $ps_id = $_POST['ps_id'];
    $query = $con->prepare('UPDATE product_supplies SET status=2 WHERE ps_id = ?');
    $query->bind_param('i', $ps_id);
    $query->execute();
    echo 1;
}
function selectProductQuantity()
{
    global $con;
    $branch_id = $_POST['branch_id'];
    $product_id = $_POST['product_id'];
    $product_type = $_POST['product_type'];
    if ($product_type == 1) {
        $selectproductssupplies = $con->prepare('SELECT supply_id,quantity FROM product_supplies WHERE product_id =?');
        $selectproductssupplies->bind_param('i', $product_id);
        $selectproductssupplies->execute();
        $result = $selectproductssupplies->get_result();
        $data = array();
        while ($r = $result->fetch_array()) {
            $data[] = $r;
        }
        // echo sizeof($data);
        // echo json_encode($data);
        for ($i = 0; $i < sizeof($data); $i++) {
            $query = $con->prepare('SELECT quantity FROM branch_supplies WHERE branch_id = ? AND supply_id = ? GROUP BY supply_id order by supply_id');
            $query->bind_param('ii', $branch_id, $data[$i]['supply_id']);
            $query->execute();
            $query->store_result();
            $query->bind_result($quantity);
            $query->fetch();
            $data2 = array();
            array_push($data2, ["qty" => $quantity, 'qty_need' => $data[$i]['quantity']]);
        }
        if (empty($data2)) {
            echo 1;
        } else {
            echo json_encode($data2);
        }
    } else if ($product_type == 2) {
        $query = $con->prepare('SELECT stock FROM branch_products WHERE product_id = ? AND branch_id =?');
        $query->bind_param('ii', $product_id, $branch_id);
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while ($r = $result->fetch_array()) {
            $data[] = $r;
        }
        echo json_encode($data);
    }
}
function subtractSupplyBranch()
{
    global $con;
    $branch_id = $_POST['branch_id'];
    $product_id = $_POST['product_id'];
    $product_type = $_POST['product_type'];
    if ($product_type == 1) {
        $selectproductssupplies = $con->prepare('SELECT supply_id,quantity FROM product_supplies WHERE product_id =?');
        $selectproductssupplies->bind_param('i', $product_id);
        $selectproductssupplies->execute();
        $result = $selectproductssupplies->get_result();
        $data = array();
        while ($r = $result->fetch_array()) {
            $data[] = $r;
        }
        if ($branch_id != 0) {
            for ($i = 0; $i < sizeof($data); $i++) {
                $query = $con->prepare('SELECT quantity FROM branch_supplies WHERE branch_id = ? AND supply_id = ? GROUP BY supply_id order by supply_id');
                $query->bind_param('ii', $branch_id, $data[$i]['supply_id']);
                $query->execute();
                $query->store_result();
                $query->bind_result($quantity);
                $query->fetch();
                $diff =  (int)$quantity - (int)$data[$i]['quantity'];
                // $diff = $data[$i];
                $update_qty_supplies = $con->prepare('UPDATE branch_supplies SET quantity = ? WHERE supply_id = ? AND branch_id = ?');
                $update_qty_supplies->bind_param('iii', $diff, $data[$i]['supply_id'], $branch_id);
                $update_qty_supplies->execute();
                // echo json_encode($data);
                // echo $diff;
            }
        }
    } else if ($product_type == 2) {
        $query = $con->prepare('SELECT stock FROM branch_products WHERE product_id = ? and branch_id = ?');
        $query->bind_param('ii', $product_id, $branch_id);
        $query->execute();
        $query->store_result();
        $query->bind_result($stock);
        $query->fetch();
        $diff = $stock - 1;
        $updatQuery = $con->prepare('UPDATE branch_products SET stock = ? WHERE branch_id = ? AND product_id = ?');
        $updatQuery->bind_param('iii', $diff, $branch_id, $product_id);
        $updatQuery->execute();
    }
}
function addqtySupplyBranch()
{
    global $con;
    $branch_id = $_POST['branch_id'];
    $product_type = $_POST['product_type'];
    $product_id = $_POST['product_id'];
    if ($product_type == 1) {
        $selectproductssupplies = $con->prepare('SELECT supply_id,quantity FROM product_supplies WHERE product_id =?');
        $selectproductssupplies->bind_param('i', $product_id);
        $selectproductssupplies->execute();
        $result = $selectproductssupplies->get_result();
        $data = array();
        while ($r = $result->fetch_array()) {
            $data[] = $r;
        }
        if ($branch_id != 0) {
            for ($i = 0; $i < sizeof($data); $i++) {
                $query = $con->prepare('SELECT quantity FROM branch_supplies WHERE branch_id = ? AND supply_id = ? GROUP BY supply_id order by supply_id');
                $query->bind_param('ii', $branch_id, $data[$i]['supply_id']);
                $query->execute();
                $query->store_result();
                $query->bind_result($quantity);
                $query->fetch();
                $diff =  (int)$quantity + (int)$data[$i]['quantity'];
                // $diff = $data[$i];
                $update_qty_supplies = $con->prepare('UPDATE branch_supplies SET quantity = ? WHERE supply_id = ? AND branch_id = ?');
                $update_qty_supplies->bind_param('iii', $diff, $data[$i]['supply_id'], $branch_id);
                $update_qty_supplies->execute();
                // echo json_encode($data);
                echo $diff;
            }
        }
    } else if ($product_type == 2) {
        $query = $con->prepare('SELECT stock FROM branch_products WHERE product_id = ? and branch_id = ?');
        $query->bind_param('ii', $product_id, $branch_id);
        $query->execute();
        $query->store_result();
        $query->bind_result($stock);
        $query->fetch();
        $diff = $stock + 1;
        $updatQuery = $con->prepare('UPDATE branch_products SET stock = ? WHERE branch_id = ? AND product_id = ?');
        $updatQuery->bind_param('iii', $diff, $branch_id, $product_id);
        $updatQuery->execute();
    }
}
function purchaseItem()
{
    global $con;
    $item_id = $_POST['item'];
    $type = $_POST['type'];
    $quantity_whole = $_POST['quantity_whole'];
    $UoM1 = $_POST['UoM1'];
    $quantity_simplified = $_POST['quantity_simplified'];
    $UoM2 = $_POST['UoM2'];
    $acquisition_cost = $_POST['acquisition_cost'];
    $total_amount = $_POST['total_amount'];
    $purchased_by = $_POST['purchased_by'];
    $pass = $_POST['pass'];
    $bound_to = $_POST['bound_to'];
    $supplier_id = $_POST['supplier_id'];
    $created_date = $_POST['created_date'];
    $query = $con->prepare('SELECT pword FROM users where userid=?');
    $query->bind_param('i', $purchased_by);
    $query->execute();
    $query->store_result();
    $query->bind_result($pword);
    $query->fetch();
    if (password_verify($pass, $pword)) {
        addPurchase($item_id,$type,$quantity_whole,$UoM1,$quantity_simplified,$UoM2,$acquisition_cost,$total_amount,
            $purchased_by,$bound_to,$supplier_id,$created_date);
        if ($type == 1) {
            // storable
            updateProduct($item_id, $type, $quantity_simplified, $created_date, $bound_to);
            echo 1;
        } else if ($type == 2) {
            updateProductSupplies($item_id, $quantity_simplified,$UoM2, $created_date, $bound_to);
            echo 1;
        }
    } else {
        echo 0; //wrong pass
    }
}
function addPurchase($item_id,$type,$quantity_whole,$UoM1,$quantity_simplified,$UoM2,$acquisition_cost,$total_amount,
    $purchased_by,$bound_to,$supplier_id,$created_date
) {
    global $con;
    $query = $con->prepare("INSERT INTO purchases( `item_id`, `type`,`quantity_whole`, `unit_whole`, `quantity_simplified`, `unit_simplified`, `acquistion_cost`, `total_amount`, `purchased_by`, `bound_to`, `supplier_id`, `created_date`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
    $query->bind_param('iiiiiiiiiiis',$item_id,$type,$quantity_whole,$UoM1,$quantity_simplified,$UoM2,$acquisition_cost,
        $total_amount,$purchased_by,$bound_to,$supplier_id,$created_date);
    $query->execute();
}
function updateProduct($item_id, $quantity_simplified, $created_date, $bound_to)
{
    global $con;
    if ($bound_to == 0 ){
        updatepresentProduct($item_id,$quantity_simplified);
    }else{
    $q = $con->prepare('SELECT acquired_quantity,stock FROM branch_products WHERE branch_id=? AND product_id=?');
    $q->bind_param('ii', $bound_to, $item_id);
    $q->execute();
    $q->store_result();
    $q->bind_result($acquired_qty, $stock);
    $q->fetch();
    if ($q->num_rows == 0) {
        $query = $con->prepare("INSERT INTO branch_products(branch_id,product_id,acquired_quantity,unit,stock) VALUES(?,?,?,?,?)");
        $query->bind_param('iiiii', $bound_to, $item_id, $quantity_simplified, $UoM2, $quantity_simplified);
        $query->execute();
    } else {
        $acquired = $acquired_qty + $quantity_simplified;
        $stocks = $stock + $quantity_simplified;
        $que = $con->prepare("UPDATE branch_products SET acquired_quantity=?, stock=? WHERE branch_id =? AND product_id=?");
        $que->bind_param('iiii', $acquired, $stocks, $bound_to, $item_name);
        $que->execute();
    }}
}
function updateProductSupplies($item_id, $quantity_simplified,$UoM2, $created_date, $bound_to)
{
    global $con;
    if ($bound_to == 0){
        updatepresentSupplies($item_id,$quantity_simplified);
    }else{
        $q = $con->prepare('SELECT received_qty,quantity FROM branch_supplies WHERE branch_id=? AND supply_id=?');
        $q->bind_param('ii', $bound_to, $item_id);
        $q->execute();
        $q->store_result();
        $q->bind_result($acquired_qty, $stock);
        $q->fetch();
        if ($q->num_rows == 0) {
            $query = $con->prepare("INSERT INTO branch_supplies(branch_id,supply_id,received_qty,UoM,quantity) VALUES(?,?,?,?,?)");
            $query->bind_param('iiiii', $bound_to, $item_id, $quantity_simplified, $UoM2, $quantity_simplified);
            $query->execute();
        } else {
            $acquired = $acquired_qty + $quantity_simplified;
            $stocks = $stock + $quantity_simplified;
            $que = $con->prepare("UPDATE branch_supplies SET received_qty=?, quantity=? WHERE branch_id =? AND supply_id=?");
            $que->bind_param('iiii', $acquired, $stocks, $bound_to, $item_id);
            $que->execute();
        }}
}
function updatepresentProduct($item_id,$quantity_simplified){
    global $con;
    $q = $con->prepare('SELECT acquired_quantity,quantity FROM products WHERE product_id=?');
    $q->bind_param('i', $item_id);
    $q->execute();
    $q->store_result();
    $q->bind_result($acquired_qty, $stock);
    $q->fetch();
    $acquired = $acquired_qty + $quantity_simplified;
    $stocks = $stock + $quantity_simplified;
    $query = $con->prepare('UPDATE products set acquired_quantity=?, quantity=? WHERE product_id =?');
    $query->bind_param('iii', $acquired,$stocks,$item_id);
    $query->execute();
}
function updatepresentSupplies($item_id,$quantity_simplified){
    global $con;
    $q = $con->prepare('SELECT acquired_quantity,quantity FROM supplies WHERE supply_id=?');
    $q->bind_param('i', $item_id);
    $q->execute();
    $q->store_result();
    $q->bind_result($acquired_qty, $stock);
    $q->fetch();
    $acquired = $acquired_qty + $quantity_simplified;
    $stocks = $stock + $quantity_simplified;
    $query = $con->prepare('UPDATE supplies set acquired_quantity=?, quantity=? WHERE supply_id =?');
    $query->bind_param('iii', $acquired,$stocks,$item_id);
    $query->execute();
}











//purchase new item 
function newpurchaseItem()
{
    global $con;
    $item_name = $_POST['item'];
    $type = $_POST['type'];
    $quantity_whole = $_POST['quantity_whole'];
    $UoM1 = $_POST['UoM1'];
    $quantity_simplified = $_POST['quantity_simplified'];
    $UoM2 = $_POST['UoM2'];
    $acquisition_cost = $_POST['acquisition_cost'];
    $total_amount = $_POST['total_amount'];
    $purchased_by = $_POST['purchased_by'];
    $pass = $_POST['pass'];
    $bound_to = $_POST['bound_to'];
    $supplier_id = $_POST['supplier_id'];
    $created_date = $_POST['created_date'];
    $default = 'uploads/default.png';
    $query = $con->prepare('SELECT pword FROM users where userid=?');
    $query->bind_param('i', $purchased_by);
    $query->execute();
    $query->store_result();
    $query->bind_result($pword);
    $query->fetch();
    if (password_verify($pass, $pword)) {
        if ($type == 1) {
            // storable
            $product_id = addpurchaseproduct($item_name, $type, $quantity_simplified, $UoM2, $created_date, $default, $bound_to,$acquisition_cost);
            addPurchase(
                $product_id,$type,$quantity_whole,$UoM1,$quantity_simplified,$UoM2,$acquisition_cost,$total_amount,
                $purchased_by,$bound_to,$supplier_id,$created_date
            );
            echo 1;
        } else if ($type == 2) {
            //consumable
            $supply_id = addpurchaseproductsupplies($item_name, $quantity_simplified, $UoM2, $created_date, $bound_to);
            addPurchase(
                $supply_id,$type,$quantity_whole,$UoM1,$quantity_simplified,$UoM2,$acquisition_cost,$total_amount,
                $purchased_by,$bound_to,$supplier_id,$created_date
            );
            echo 1;
        }
    } else {
        echo 0; //wrong pass
    }
}
function addpurchaseproduct($item_name, $type, $quantity_simplified, $UoM2, $created_date, $default, $bound_to,$acquisition_cost)
{
    global $con;
    //insert commissary
    if ($bound_to == 0){
        $product_id = addToProduct($item_name,$acquisition_cost,$type,$quantity_simplified,$default,$created_date);
        return $product_id;
    }else{
       //insert into the specific branches 
       $q = $con->prepare('SELECT acquired_quantity,stock FROM branch_products WHERE branch_id=? AND product_id=?');
       $q->bind_param('ii', $bound_to, $item_name);
       $q->execute();
       $q->store_result();
       $q->bind_result($acquired_qty, $stock);
       $q->fetch();
       if ($q->num_rows == 0) {
            $query = $con->prepare("INSERT INTO branch_products(branch_id,product_id,acquired_quantity,unit,stock) VALUES(?,?,?,?,?)");
            $query->bind_param('iiiii', $bound_to, $item_name, $quantity_simplified, $UoM2, $quantity_simplified);
            $query->execute();
            $product_id = $query->insert_id;
            return $product_id;
        } else {
            $acquired = $acquired_qty + $quantity_simplified;
            $stocks = $stock + $quantity_simplified;
            $que = $con->prepare("UPDATE branch_products SET acquired_quantity=?, stock=? WHERE branch_id =? AND product_id=?");
            $que->bind_param('iiii', $acquired, $stocks, $bound_to, $item_name);
            $que->execute();
            $product_id = $que->insert_id;
            return $product_id;
        }
    }
    
}
function addpurchaseproductsupplies($item_name, $quantity_simplified, $UoM2, $created_date, $bound_to)
{
    global $con;
    if ($bound_to == 0){
        $supply_id = addToSupplies($item_name,$quantity_simplified,$created_date,$UoM2);
        return $supply_id;
    }else {
    $q = $con->prepare('SELECT received_qty,quantity FROM branch_supplies WHERE branch_id=? and supply_id=?');
    $q->bind_param('ii', $bound_to, $item_name);
    $q->execute();
    $q->store_result();
    $q->bind_result($acquired_qty, $stock);
    $q->fetch();
    if ($q->num_rows == 0) {
        $query = $con->prepare("INSERT INTO branch_supplies(branch_id,supply_id,received_qty,UoM,quantity) VALUES(?,?,?,?,?)");
        $query->bind_param('iiiii', $bound_to, $item_name, $quantity_simplified, $UoM2, $quantity_simplified);
        $query->execute();
        $supply_id = $query->insert_id;
        return $supply_id;
    } else {
        $acquired = $acquired_qty + $quantity_simplified;
        $stocks = $stock + $quantity_simplified;
        $que = $con->prepare("UPDATE branch_supplies SET received_qty=?, UoM=?, quantity=? WHERE branch_id =? AND product_id=?");
        $que->bind_param('iiiii', $acquired,$UoM2, $stocks, $bound_to, $item_name);
        $que->execute();
        $supply_id = $que->insert_id;
        return $supply_id;
    }
    }
}
function displayPurchase()
{
    global $con;
    $query = $con->prepare("SELECT * FROM purchases");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($r = $result->fetch_array()) {
        $data[] = $r;
    }
    echo json_encode($data);
}
function addToProduct($item_name,$acquisition_cost,$type,$quantity_simplified,$default,$created_date){
    global $con;
    $query=$con->prepare('INSERT INTO products(product_name,acquisition_cost,type,quantity,img,created_date) VALUES(?,?,?,?,?,?)');
    $query->bind_param('siiiss', $item_name,$acquisition_cost,$type,$quantity_simplified,$default,$created_date);
    $query->execute();
    $product_id = $query->insert_id;
    return $product_id;
}
function addToSupplies($item_name,$quantity_simplified,$created_date,$UoM2){
    global $con;
    $query=$con->prepare('INSERT INTO supplies(supply_name,quantity,unit,acquired_quantity,created_date) VALUES(?,?,?,?,?)');
    $query->bind_param('siiis', $item_name,$quantity_simplified,$UoM2,$quantity_simplified,$created_date);
    $query->execute();
    $supply_id = $query->insert_id;
    return $supply_id;
}

function selectTransportProducts()
{
    global $con;
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $query = $con->prepare('SELECT SUM(quantity) as quantity from products WHERE product_id=?');
    $query->bind_param('i', $product_id);
    $query->execute();
    $query->store_result();
    $query->bind_result($left_quantity);
    $query->fetch();
    if ((int)$left_quantity < (int)$quantity) {
        echo 1;
    } else {
        $query = $con->prepare('SELECT UoM from products WHERE product_id=?');
        $query->bind_param('i', $product_id);
        $query->execute();
        $query->store_result();
        $query->bind_result($UoM);
        $query->fetch();
        echo $UoM;
    }
}
