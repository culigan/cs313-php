<?php

$db;

try
{
    $dbUrl = getenv('DATABASE_URL');
    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach($db->query("SELECT * FROM MeasureType") as $row)
            {
                echo "<a class='scripture' href='display.php?id=$row[id]' >";
                echo $row[book]." ".$row[chapter].":".$row[verse];
                echo "</a><br/>";

            }
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Shopping Page</title>
   <link href="Project.css" rel="stylesheet">
   <script src="AssignWeek3_B.js"></script>
</head>
<body>
   <header>Checkout</header>
   <div id='itemdiv'>
      <form action="Poject_2.php" method="post">
         <p></p></br>
         <div id="select">
         <select name="amount0"  required>
               <option value="1/2">1/2</option>
            </select>Amount
            <select name="meastype0" required>
               <option value="Cup">Cup</option>
            </select>Measurement Type
         </div>
         <input name="street" type="text" required>Street Address</br></br>
         <input name="city" type="text" required>City</br></br>
         <input name="state" type="text" required>State</br></br>
         <input name="zip" type="text" required>Zip</br></br>
         <p><a href="AssignWeek3_Cart.php">Return to Cart</a></p>
         <input type="submit" value="Submit">
      </form>
   </div>
</body>
</html>