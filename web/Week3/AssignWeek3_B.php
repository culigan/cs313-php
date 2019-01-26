<?php
   session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Browsing Page</title>
  <link href="AssignWeek3.css" rel="stylesheet">
   <script src="AssignWeek3_B.js"></script>
</head>
<body>
   <header>Clothing Sale</header>
   <div id="itemdiv">
      <h1>Pants</h1>
      <?php
         $_SESSION["pants"] = 0;
         echo $_SESSION["pants"];
      ?>
      <input id="pants" type="button" name="pantsbutton" value="Add to Cart" onclick="addToCart(this)"/>
   </div>
   <div id="itemdiv">
      <h1>Long sleeve t-shirts</h1>
      <?php
         $_SESSION["lsshirt"] = 0;
      ?>
      <input id="lsshirt" type="button" name="lssbutton" value="Add to Cart"  onclick="addToCart(this)"/>
   </div>
   <div id="itemdiv">
      <h1>Short sleeve t-shirts</h1>
      <?php
         $_SESSION["ssshirt"] = 0;
      ?>
      <input id="ssshirt" type="button" name="sssbutton" value="Add to Cart"  onclick="addToCart(this)"/>
   </div>
   <div id="itemdiv">
      <h1>Socks</h1>
      <?php
         $_SESSION["socks"] = 0;
      ?>
      <input id="socks" type="button" name="sockbutton" value="Add to Cart"  onclick="addToCart(this)"/>
   </div>
   <div id="itemdiv">
      <h1>Sweater</h1>
      <?php
         $_SESSION["sweater"] = 0;
      ?>
      <input id="sweater" type="button" name="sweatbutton" value="Add to Cart"  onclick="addToCart(this)"/>
   </div>
   <div id="itemdiv">
      <h1>Sweatshirt</h1>
      <?php
         $_SESSION["swshirt"] = 0;
      ?>
      <input id="swshirt" type="button" name="sweatsbutton" value="Add to Cart"  onclick="addToCart(this)"/>
   </div>
</body>
</html>