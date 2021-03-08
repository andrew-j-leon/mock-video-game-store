<?php
   include "dbConnect.php";

   try {

      $conn = connect();

      $st = $_REQUEST["state"];

      $sqlQuery = "SELECT distinct CITY FROM us_cities WHERE ID_STATE = (SELECT ID from us_states WHERE STATE_CODE = '$st')";

      $stmt = $conn->prepare($sqlQuery);
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_NUM);

      while($row = $stmt->fetch())
      {
         echo $row[0];
         echo ";";
      }

   }

   catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
   }  
   
   catch (Exception $e2) {
       echo "Error: " . $e2->getMessage();
   }

   $conn = null;
?>
