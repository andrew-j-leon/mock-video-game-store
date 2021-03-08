<!DOCTYPE html>

<html>
<head>
   <title>Purchase Form</title>
        <link rel="stylesheet" href="../css/ecommerce.css">
        <style>
         .box {
            float: left;
               }
            
            select, input {
                  background-color: #07007e;
                     color: #cccccc;
                  border-radius: 5px;
               }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    
<body>
   <form name="purchaseForm" onsubmit="return validateForm()" 
              action="uploadForm.php" method="post">

<?php
    $productID = $_GET['productID'];
      
    echo "ProductID: ";
    echo "<select name=\"productID\">";
    echo "<option value=\"$productID\">$productID</option>";
    echo "</select><br><br>";
?>

<fieldset>
   <legend>Email</legend>
         Email<br>
   <input type="text" name="email" required>
</fieldset>

<fieldset>
   <legend>Credit Card Information</legend>
                Payment Method<br>
            <select name="paymentMethod" required>
                  <option value="Visa">Visa</option>
                     <option value="Mastercard">MasterCard</option>
                     <option value="AmericanExpress">American Express</option>
                     <option value="Discover">Discover</option>
                     <option value="JCB">JCB</option>
      </select>

                <div>
                  Card number<br><input type="text" name="cardNumber" maxlength="16" 
                                          size="17" required>
                </div>
                <div>
                  Expiration date and security code<br>
                     <select id="expireMonth" name="expireMonth">
                     </select>
                     <select id="expireYear" name="expireYear">
                     </select>
                     <input type="text" name="securityCode" maxlength="3" size="3" required>
      </div>
</fieldset><br>

<fieldset>
   <legend>Billing Information</legend>
   <div class="box">
      <div>
      <div class="box">
                  First name<br>
                     <input type="text" name="firstname" required>
                     </div>
                     <div class="box">
                     Last name<br>
                     <input type="text" name="lastname" required>
                     </div>
                </div><br><br><br>

                <div class="box">
                Billing address (#)<br>
                <input type="text" name="addressNumber" maxlength="5" 
                       size="6" required></div>
               
                <div class="box" style="margin-left: 47px">
                Billing address (Street)<br>
                <input type="text" name="streetName" required></div>
                <br><br><br>

   Phone number<br>
      <input type="text" name="phoneNumber" required><br>
                (Ex's: (425)-235-2356 <br>or (425) 235 2356 <br>or 425 235 2356 <br>or 4252352356)
   </div> </div>
                
   <div class="box" style="margin-left:20px">
   Country<br> 
                
   <select name="country" onchange="displayState(this.value)" required>
      <option value="">Select a Country:</option>
      <option value="Brazil">Brazil</option>
      <option value="Canada">Canada</option>
      <option value="China">China</option>
      <option value="France">France</option>
      <option value="Germany">Germany</option>
      <option value="Japan">Japan</option>
      <option value="Mexico">Mexico</option>
      <option value="Russia">Russia</option>
      <option value="South Korea">South Korea</option>
      <option value="United Kingdom">United Kingdom</option>
      <option value="United States">United States</option>
   </select>
   (Select "United States" for a more robust use of AJAX)<br><br>
      
   <div id="dynamicDiv"></div></div>

   </fieldset><br><br>
   <input type="submit" value="Submit">
   </form>
    

<script language="Javascript" src="../js/validateForm.js"></script>
<script language="Javascript" src="../js/formCreation.js">

</script>
</body>
</html>
