
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

    $sizes = $db->query("SELECT * FROM MeasurementSize;");
    $types = $db->query("SELECT * FROM MeasurementType;");
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
   <title>Add a Recipe</title>
   <link href="Project.css" rel="stylesheet">
   <script src="ProjectJS.js"></script>
</head>
<body >   
   <header>Add a Recipe</header>
   <div id='itemdiv'>
      <form id="formid" action="Project_1.php" method="post">
         <p>
         <?php
         if(isset($_POST['amount0']))
         {
            echo 'Recipe successfully saved!';
         }
         ?>
         </p></br>
            <input name="recipename" type="text" required>Recipe Name</br></br>

         <div id="ingred">
            <select name="amount0"  required>
               <? 
               foreach($sizes as $size){
               echo "<option> $size[measurementsize]</option>";
               }
               ?>
            </select>Amount
            <select name="meastype0" required>
               <? 
                  foreach($types as $type){
                  echo "<option> $type[measurementname]</option>";
                  }
               ?>
            </select>Measurement Type
            <input name="ingredient0" type="text" required>Ingredient</br></br>
         </div>
         <input name="add" type="button" value="Add another Ingredient" onclick="addItem()"></br></br>
         <textarea name="direct" rows="4" cols="50" required>Enter directions here....</textarea></br></br>
         <input type="submit" value="Submit">
      </form>
   </div>
</body>
</html>