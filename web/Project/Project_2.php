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
      <form id="searchforum" action="Project_2.php" method="post">         
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
         <?php
            if(!empty($_POST)){
               $searchString = "Select r.recipename, r.directions";
               $fromString = " FROM recipes r ";
               $whereString = " where";
               //if(isset($_POST['type0'])){
                  //$searchString = $searchString . ", f.typename";
                  $fromString = " inner join FoodType f on r.foodtype_id = f.id ";
                  $whereString = " f.typename = $_POST['type0']";   
               //}
               /*if(isset($_POST['mealCat0'])){
                  $searchString = $searchString . ", c.categoryname";
                  $fromString = $fromString . " inner join MealCategory m on r.MealCategory_ID = m.id ";
                  $whereString = $whereString . " AND m.categoryname = $_POST['mealCat0']";   
               }
               if(isset($_POST['recipename'])){
                  $whereString = $whereString . " AND r.recipename = $_POST['recipename'] ";   
               }
               if(isset($_POST['ingred'])){
                  $searchString = $searchString . ", i.ingredientname";
                  $fromString = $fromString . " inner join recipeitems ri on r.recipeitems_id = ri.id";
                  $whereString = $whereString . "and ri.Ingredients like '%sugar%'; $_POST['ingred']";   
               }
               $searchString = $searchString . $fromString;
               if($whereString.length > 6)
                  $searchString = $searchString . $whereString
               $searchString = $searchString . ";";
               echo $db->query($searchString);*/
            }
         ?>
         </p>
      </div>
   </div>
</body>
</html>