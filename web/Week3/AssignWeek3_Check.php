<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Shopping Page</title>
   <link href="AssignWeek3.css" rel="stylesheet">
   <script src="AssignWeek3_B.js"></script>
</head>
<body>
   <header>Shopping Cart</header>
   <form action="AssignWeek3_Confirm.php" method="post">
      Street Address: <input name="street" type="text" required></br></br>
      City: <input name="city" type="text" required></br></br>
      State: <input name="state" type="text" required></br></br>
      Zip: <input name="zip" type="text" required></br></br>
      <p><a href="AssignWeek3_Cart.php">Return to Cart</a></p>
      <input type="submit" value="submit">
   </form>
</body>
</html>