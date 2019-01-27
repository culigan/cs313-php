<?php
   //if (session_status() == PHP_SESSION_NONE) {
    session_start();
//}  
   
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Shopping Page</title>
   <script src="AssignWeek3_B.js"></script>
</head>
<body>
   <header>Shopping Cart</header>
   <div id="itemdiv">
      <?php
      echo $_SESSION['pants'];
         foreach($_SESSION as $name => $value)
         {
            if((int)$value > 0)
               echo $name . "=" . $value . "<br>";
         }
      ?>
   </div>
   <p><a href="http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_B.php"</a>Continue Shopping</p>
   <input type="button" value="Proceed to Checkout">
</body>
</html>