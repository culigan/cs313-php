﻿<?php

   $count = count($_POST);
   $count = ($count - 1) / 3;
      echo "here";
    $stmt = $db->query("Update recipe set recipename = $_POST['recipenam']" );
    //$stmt->bindValue(':recipename', $_POST['recipenam']);
    //$stmt->execute();
    echo "here";
    for($i = 0; $i < $count; $i++)
    {
      $ingredStmt = "Update recipeitems Set measurementsize_id = $_POST['size$count'], ";
	   $ingredStmt .= "measurementtype_id = $_POST['type$count'], ingredient = $_POST['ingred$count'] "
      $ingredStmt .= "Where recipe_id = (Select id from recipe where recipename = $_POST['recipenam']); ";
      $updateStmt = $db->prepare($ingredStmt);
      $updateStmt->execute();
    }

    echo "<span>Recipe Saved </span>";
    usleep(5000);
    header("Location: Project_2.php");

?>



<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Search Recipes</title>
   <link href="Project.css" rel="stylesheet">
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
               $searchString = "Select r.id, r.recipename";
               $fromString = " FROM recipe r ";
               $whereString = " where";
               if(isset($_POST['type0']) && !empty($_POST['type0'])){
                  //$searchString = $searchString . ", f.typename";
                  $fromString = $fromString . " inner join FoodType f on r.foodtype_id = f.id ";
                  $whereString = $whereString . " f.typename = '" . htmlspecialchars($_POST['type0']) . "'"; 
                  
               }
               if(isset($_POST['mealCat0']) && !empty($_POST['mealCat0'])){
                  //$searchString = $searchString . ", c.categoryname";
                  $fromString = $fromString . " join mealcategory m on r.mealcategory_id = m.id ";
                  if(strlen($whereString) < 8)
                     $whereString = $whereString . " m.categoryname = '" . htmlspecialchars($_POST['mealCat0']) . "'";   
                  else
                     $whereString = $whereString . " AND m.categoryname = '" . htmlspecialchars($_POST['mealCat0']) . "'";   
                  
               }
               if(isset($_POST['recipename']) && !empty($_POST['recipename'])){
                  if(strlen($whereString) < 8)
                     $whereString = $whereString . " r.recipename like '%" . htmlspecialchars($_POST['recipename']) . "%'";   
                  else 
                     $whereString = $whereString . " AND r.recipename  like '%" . htmlspecialchars($_POST['recipename']) . "%'";   
                  echo $whereString . "</br>";
               }
               if(isset($_POST['ingred']) && !empty($_POST['ingred'])){
                  //$searchString = $searchString . ", i.ingredientname";
                  $fromString = $fromString . " join recipeitems ri on r.id = ri.recipe_id";
                  if(strlen($whereString) < 8)
                     $whereString = $whereString . " ri.ingredient like '%" . htmlspecialchars($_POST['ingred']) . "%'"; 
                  else 
                     $whereString = $whereString . " and ri.ingredient like '%" . htmlspecialchars($_POST['ingred']) . "%'"; 
                  
               }
               $searchString = $searchString . $fromString;
               if(strlen($whereString) > 6)
                  $searchString = $searchString . $whereString;
               $searchString = $searchString . ";";
               foreach( $db->query($searchString) as $row)
               {
                  if($_SESSION['type'] == "edit"){
                      echo "<a class=\"recipefound\" href=\"Project_Edit.php?id=" . $row[id] . "\" >";
                      echo $row[recipename];
                      echo "</a><br/>";
                  }
                  else{
                      echo "<a class=\"recipefound\" href=\"Project_Display.php?id=" . $row[id] . "\" >";
                      echo $row[recipename];
                      echo "</a><br/>";
                  }
               }
               //unset($_SESSION['type']);
            }
         ?>
         </p>
      </div>
   </div>
</body>
</html>