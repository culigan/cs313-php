﻿<?php
   session_start();
   $temp = "before";
   //$temp = $_POST['pants'];
   $_SESSION['pants'] = $_POST['pants'];
   
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Browsing Page</title>
  <link href="AssignWeek3.css" rel="stylesheet">
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript" src="AssignWeek3_B.js"></script>
</head>
<body>
   <header>Clothing Sale</header>
   <div id="itemdiv">
      <h1>Pants</h1>
      <?php
         echo $_SESSION['pants'];
      ?>
      <form id="theform1" name="formname" action="AssignWeek3_B.php" method="post">
         <input id="pants" type="button" name="pantsbutton" value="Add to Cart" onclick="buttonClick()"/>
      </form>
   </div>
   <div id="itemdiv">
      <h1>Long sleeve t-shirts</h1>
      <input id="lsshirt" type="button" name="lssbutton" value="Add to Cart"/>
   </div>
   <div id="itemdiv">
      <h1>Short sleeve t-shirts</h1>
      <input id="ssshirt" type="button" name="sssbutton" value="Add to Cart" />
   </div>
   <div id="itemdiv">
      <h1>Socks</h1>
      <input id="socks" type="button" name="sockbutton" value="Add to Cart"/>
   </div>
   <div id="itemdiv">
      <h1>Sweater</h1>
      <input id="sweater" type="button" name="sweatbutton" value="Add to Cart" />
   </div>
   <div id="itemdiv">
      <h1>Sweatshirt</h1>
      <input id="swshirt" type="button" name="sweatsbutton" value="Add to Cart" />
   </div>
</body>
</html>