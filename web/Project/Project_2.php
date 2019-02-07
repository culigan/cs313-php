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
         <input name="ingred" type="text" >Ingredients</br></br>
         <input type="submit" value="Search">
      </form>
      <div id="results">
         <p id="resultPara">
         <?php
            if(!empty($_POST)){
               $searchString = "Select r.recipename";
               $fromString = " FROM recipe r ";
               $whereString = " where";
               if(isset($_POST['type0']) && !empty($_POST['type0'])){
                  //$searchString = $searchString . ", f.typename";
                  $fromString = $fromString . " inner join FoodType f on r.foodtype_id = f.id ";
                  $whereString = $whereString . " f.typename = '" . $_POST['type0'] . "'"; 
                  
               }
               if(isset($_POST['mealCat0']) && !empty($_POST['mealCat0'])){
                  //$searchString = $searchString . ", c.categoryname";
                  $fromString = $fromString . " join mealcategory m on r.mealcategory_id = m.id ";
                  if(strlen($whereString) < 8)
                     $whereString = $whereString . " m.categoryname = '" . $_POST['mealCat0'] . "'";   
                  else
                     $whereString = $whereString . " AND m.categoryname = '" . $_POST['mealCat0'] . "'";   
                  
               }
               if(isset($_POST['recipename']) && !empty($_POST['recipename'])){
                  if(strlen($whereString) < 8)
                     $whereString = $whereString . " r.recipename like '%" . $_POST['recipename'] . "%'";   
                  else 
                     $whereString = $whereString . " AND r.recipename  like '%" . $_POST['recipename'] . "%'";   
                  echo $whereString . "</br>";
               }
               if(isset($_POST['ingred']) && !empty($_POST['ingred'])){
                  //$searchString = $searchString . ", i.ingredientname";
                  $fromString = $fromString . " join recipeitems ri on r.id = ri.recipe_id";
                  if(strlen($whereString) < 8)
                     $whereString = $whereString . " ri.ingredient like '%" . $_POST['ingred'] . "%'"; 
                  else 
                     $whereString = $whereString . " and ri.ingredient like '%" . $_POST['ingred'] . "%'"; 
                  
               }
               $searchString = $searchString . $fromString;
               if(strlen($whereString) > 6)
                  $searchString = $searchString . $whereString;
               $searchString = $searchString . ";";
               foreach( $db->query($searchString) as $row)
               {
                echo "<a class='recipefound' onclick='sendRecipeID(" . row[id] . ")' href='#' >";
                echo $row[recipename];
                echo "</a><br/>";

               }
            }
         ?>
         </p>
      </div>
   </div>
</body>
</html>