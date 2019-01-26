<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Browsing Page</title>
   <script src="PurchaseJS.js"></script>
</head>
<body>
   <header>Clothing Sale</header>
   <div id="itemdiv">
      <?php
         foreach($_SESSION as $name => $value)
         {
            if((int)$value > 0)
               echo $name . "=" . $value . "<br>";
         }
      ?>
   </div>
</body>
</html>