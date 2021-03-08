<?php
    include_once "util/session.php";
    include_once "util/components.php";
    include_once "util/dbConnect.php";
    echo "<h1>Cart</h1>";
    
    Session::startSession();
    $cart = Session::getCart();
    $productIDs = "(";
    foreach ($cart as $productID => $count) {
        $productIDs .= "'$productID',";
    }
    $productIDs = rtrim($productIDs, ",") . ")";
    
//     $arr = http_build_query($cart);
//     console_log($arr);

    $columns = array("header1" => array("h1r1", "h1r2", "h1r3"), "header2" => array("h2r1", "h2r2", "h2r3"));
    
    $table = ComponentGenerator::makeTable($columns, ["testClass"]);
    
    $conn = DBConnect::connect();
    $result = DBConnect::getData($conn, "SELECT * FROM productinfo WHERE productID IN $productIDs");
    foreach ($result as $row) {
        console_log($row["title"]);
    }
    $conn = null;
    
    echo $table;
?>