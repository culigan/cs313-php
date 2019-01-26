<?php

$street = $_POST['street'];
$ctiy = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Shopping Page</title>
   <script src="PurchaseJS.js"></script>
</head>
<body>
   <header>Shopping Cart</header>
   <?php
      echo "$street <br/>";
      echo "$city <br/>";
      echo "$state <br/>";
      echo "$zip <br/>";
      ?>
   <div id="itemdiv">
      <?php
         foreach($_SESSION as $name => $value)
         {
            if((int)$value > 0)
               echo $name . "=" . $value . "<br>";
         }
      ?>
   </div>
   <form action="AssignWeek3_Check.php" method="post">
      <input type="submit" value="Proceed to Checkout">
   </form>
</body>
</html>