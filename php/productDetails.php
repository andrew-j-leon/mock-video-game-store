<!DOCTYPE html>

<html>
    <head>
   <?php
      $productID = $_GET['productID'];
      echo "<title>$productID</title>";
   ?>
        <link rel="stylesheet" href="../css/ecommerce.css">
        <link rel="stylesheet" href="../css/product_details.css">        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a class="back" href="store.php"><- Back to store</a>

   <?php
      $gameTitle = $_GET['title'];
      echo "<h1><br>$gameTitle</h1>";

//       echo "<a class=\"purchase\" href=\"purchase.php?productID=$productID\" 
//             target=\"_blank\">Purchase</a>";
      
      echo "<a class=\"addToCart\" href=\"util/addToCart.php?productID=$productID\">Add to Cart</a>";
   ?>
        <h2>Product Description</h2>
        <div>
        <p>
   <?php 
      include 'util/dbConnect.php';
      $pdo = connect();

      $stmt = $pdo->query("SELECT * FROM ProductInfo WHERE productID='$productID'");

      $row = $stmt->fetch();
      
      $descLoc = "../" . $row['descLoc'];
      echo file_get_contents($descLoc);

      $pdo = null;
   ?>
        </p> </div>
        <h2>Image Gallery</h2> 
   <?php 
      $directory = "../" . $row['imagesLoc'];
      
      echo "<table>";

      echo "<tr>";
      for ($i = 0; $i <= 2; $i++)
      {
         echo "<td><img src=\"$directory$i.jpg\" alt=\"$productID Image $i\"></td>";
      }
      echo "</tr>";
      
      echo "<tr>";
      for ($i = 3; $i <=5; $i++)
      {
         echo "<td><img src=\"$directory$i.jpg\" alt=\"$productID Image $i\"></td>";
      }
      echo "</tr>";
      
      echo "</table>";
   ?>
    </body>
</html>
