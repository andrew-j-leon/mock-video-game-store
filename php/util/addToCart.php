<?php
    include_once "session.php";
    include_once "debugging.php";
    
    Session::startSession();
    
    $productID = $_GET['productID'];
    
    Session::addCartItem($productID, 1);
    
    header("Location: ../cart.php");
    exit();
?>