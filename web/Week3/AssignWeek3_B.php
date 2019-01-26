<?php
   session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Browsing Page</title>
  <link href="AssignWeek3.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script>
      $(document).ready(function(){
        $("button").click(function(){
          $.get("AssignWeek3_B.php", function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
          });
        });
      });
   </script>

</head>
<body>
   <header>Clothing Sale</header>
   <div id="itemdiv">
      <h1>Pants</h1>
      <?php
         $_SESSION["cart"] = "pants";
      ?>
      <input id="pants" type="button" name="pantsbutton" value="Add to Cart" />
   </div>
   <div id="itemdiv">
      <h1>Long sleeve t-shirts</h1>
      <?php
         $_SESSION["cart"] = "long";
      ?>
      <input id="lsshirt" type="button" name="lssbutton" value="Add to Cart"/>
   </div>
   <div id="itemdiv">
      <h1>Short sleeve t-shirts</h1>
      <?php
         $_SESSION["cart"] = "short";
      ?>
      <input id="ssshirt" type="button" name="sssbutton" value="Add to Cart" />
   </div>
   <div id="itemdiv">
      <h1>Socks</h1>
      <?php
         $_SESSION["cart"] = "sock";
      ?>
      <input id="socks" type="button" name="sockbutton" value="Add to Cart"/>
   </div>
   <div id="itemdiv">
      <h1>Sweater</h1>
      <?php
         $_SESSION["cart"] = "sweater";
      ?>
      <input id="sweater" type="button" name="sweatbutton" value="Add to Cart" />
   </div>
   <div id="itemdiv">
      <h1>Sweatshirt</h1>
      <?php
         $_SESSION["cart"] = "sweatshirt";
      ?>
      <input id="swshirt" type="button" name="sweatsbutton" value="Add to Cart" />
   </div>
</body>
</html>