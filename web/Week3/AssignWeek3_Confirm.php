<?php
   session_start();
 
   $street = htmlspecialchars($_POST['street']);
   $ctiy = htmlspecialchars($_POST['city']);
   $state = htmlspecialchars($_POST['state']);
   $zip = htmlspecialchars($_POST['zip']);
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Confirmation</title>
   <script src="AssignWeek3_B.js"></script>
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
            echo "<div id='cartitem' ><p>$value</p></div>";
         }
      ?>
   </div>
   <form action="AssignWeek3_Check.php" method="post">
      <input type="submit" value="Proceed to Checkout">
   </form>
</body>
</html>