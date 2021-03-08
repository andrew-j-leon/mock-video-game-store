<!DOCTYPE html>

<html>
<head>
   <title>Purchase Order</title>
   <link rel="stylesheet" href="../css/ecommerce.css">
</head>

<body>
<?php
   include "util/dbConnect.php";
   
   $conn = DBConnect::connect();

   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {
      $productID = testInput($_POST['productID']);
      $email = testInput($_POST['email']);
      $paymentMethod = testInput($_POST['paymentMethod']);
      $cardNumber = testInput($_POST['cardNumber']);
      $expireMonth = testInput($_POST['expireMonth']);
      $expireYear = testInput($_POST['expireYear']);
      $securityCode = testInput($_POST['securityCode']);
      $firstName = testInput($_POST['firstname']);
      $lastName = testInput($_POST['lastname']);
      $billAddrNum = testInput($_POST['addressNumber']);
      $billAddrSt = testInput($_POST['streetName']);
      $country = testInput($_POST['country']);
      $city = testInput($_POST['city']);
      $state = testInput($_POST['state']);
      $zip = testInput($_POST['zip']);
      $phoneNumber = testInput($_POST['phoneNumber']);
   }

   $sql = "INSERT INTO purchaseorder (productID, email, paymentMethod, 
      cardNumber, expireMonth, expireYear, securityCode, 
      firstName, lastName, billingAddressNumber, 
      billingAddressStreet, country, city, state, zip, 
      phoneNumber) 
      VALUES ('$productID', '$email', '$paymentMethod', '$cardNumber', 
         '$expireMonth', '$expireYear', '$securityCode',
         '$firstName', '$lastName', '$billAddrNum', '$billAddrSt', 
         '$country', '$city', '$state', '$zip', '$phoneNumber')";

   try {

      $conn->exec($sql);
      
      displayConfirmationPage();
   }

   catch(PDOException $e)
   {
      echo $sql . "<br>" . $e->getMessage();
      displayErrorPage();
   }

   $conn = null;

   function displayConfirmationPage()
   {
      echo '<a class="back" href="store.php"><- Back to store</a>';
       
      echo "<h1>Order Successfully Sent!</h1>";
      echo "<h2>Order Details:</h2>";

      echo "<p>";
      echo "<b>Product ID:</b> " . $GLOBALS['productID'] . "<br><br> 
      <b>Email:</b> " . $GLOBALS['email'] . "<br><br> 
      <b>Payment Method:</b> " . $GLOBALS['paymentMethod'] . "<br><br> 
      <b>Card Number:</b> " . substr($GLOBALS['cardNumber'], 0, 3) .  "*************<br><br> 
      <b>Card Expiration Month:</b> " . $GLOBALS['expireMonth'] . "<br><br> 
      <b>Card Expiration Year:</b> " . $GLOBALS['expireYear'] . "<br><br> 
      <b>Card Security Code:</b> " . substr($GLOBALS['securityCode'], 0, 1) . "**<br><br> 
      <b>First Name:</b> " . $GLOBALS['firstName'] . "<br> <br>
      <b>Last Name:</b> " . $GLOBALS['lastName'] . "<br><br> 
      <b>Billing Address (#):</b> " . $GLOBALS['billAddrNum'] . "<br><br> 
      <b>Billing Address (street):</b> " . $GLOBALS['billAddrSt'] . "<br><br> 
      <b>Country:</b> " . $GLOBALS['country'] . "<br><br> 
      <b>City:</b> " . $GLOBALS['city'] . "<br><br> 
      <b>State:</b> " . $GLOBALS['state'] . "<br><br> 
      <b>Zip: </b>" . $GLOBALS['zip'] . "<br><br> 
      <b>Phone Number:</b> " . $GLOBALS['phoneNumber'];
      echo "</p>";
   }

   function displayErrorPage()
   {
      echo '<a class="back" href="store.php"><- Back to store</a>';
      echo "<h1>Order Processing Unsuccessful.</h1>";
      echo "<div>There was an error in processing your order. Please try again later.</div>";
   }

   function testInput($data)
   {
      $data = trim($data);
      $data = stripslashes($data);
      
      return $data;
   }

?>
</body>
</html>  
