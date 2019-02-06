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

    $types = $db->query("SELECT * FROM FoodType;");
    $mcats = $db->query("SELECT * FROM MealCategory;");
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
   <title>Search Recipes</title>
   <link href="Project.css" rel="stylesheet">
   <script src="ProjectJS.js"></script>
</head>
<body>
   <header>Search Recipes</header>
   <div id='itemdiv'>
      <form id="searchforum" action="Poject_2.php" method="post">         
         <select name="type0" >
            <option></option>
            <? 
               foreach($types as $type){
                 echo "<option> $type[typename]</option>";
               }
            ?>
         </select>Food Type
         <select name="mealCat0">
            <option></option>
            <? 
               foreach($mcats as $mcat){
                 echo "<option> $mcat[categoryname]</option>";
               }
            ?>
         </select>Meal Category </br></br>        
         <input name="recipename" type="text">Recipe Name</br></br>
         <input name="ingred" type="text" required>Ingredients</br></br>
         <input type="submit" value="Search">
      </form>
      <div id="results">
         <p id="resultPara">
         <?
            if(isset($_POST['type0'])){
               echo $_POST['type0'];   
            }
            if(isset($_POST['mealCat0'])){
               echo $_POST['mealCat0'];   
            }
            if(isset($_POST['recipename'])){
               echo $_POST['recipename'];   
            }
            if(isset($_POST['ingred'])){
               echo $_POST['ingred'];   
   }
         ?>
         </p>
      </div>
   </div>
</body>
</html>