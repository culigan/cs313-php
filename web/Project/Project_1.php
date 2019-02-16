
<?php

   session_start();

   if(!isset($_SESSION['user'])){
      header("Location: Project_User.php");
      die();
   }

   require('DB_Connect.php');
   $db = connectToDB();

   if(isset($_POST['amount0']))
   {
      $name = $_POST['recipename'];
      $count = $_POST['count'];
      $addSize;
      $addType;
      $recipen = $_POST['recipename'];
      $direct = $_POST['direct'];
      $recfood = $_POST['food'];
      $reccat = $_POST['mealcat'];
      /*$userID = $db->query("SELECT id FROM user_table where username = '" . $_SESSION['user'] . "';");
      foreach($userID as $user)
         print_r($user[id]);*/
      $username = $_SESSION['user'];
         $queryStmt = "select id From user_table where username = :username;";
         $queryStmt = $db->prepare($queryStmt);
         $queryStmt->bindValue(':username', $username);
         $queryStmt->execute();
         $results = $queryStmt->fetchAll(PDO::FETCH_ASSOC);
      $insertString = "Insert Into Recipe (recipename, Directions, FoodType_ID,";
      $insertString .= " mealcategory_id, user_id) Values (:recipename, :directions, :foodtype_id,";
      $insertString .= " :mealcategory_id, :user_id)";
      $insertUserID = $db->prepare($insertString);
         $insertUserID->bindValue(':recipename', $recipen);
         $insertUserID->bindValue(':directions', $direct);
         $insertUserID->bindValue(':mealcategory_id', $reccat);
         $insertUserID->bindValue(':foodtype_id', $recfood);
         $insertUserID->bindValue(':user_id', $results[0][id]);
         $insertUserID->execute();

         $lastID = 3;//lastInsertID()
         
      for($i = 0; $i < $count; $i++)
      {
         $msize = $_POST['amount' . $i];
         $mtype = $_POST['meastype' . $i];
         $ingredient = $_POST['ingredient' . $i];
         $insertString1 = "Insert Into Recipeitems (measurementsize, measuremnttype, ingredient, recipe_id";
      $insertString1 .= ") Values (:msize, :mtype, :ingredient, :lastID)";
      echo $insertString1 . "</br>";
      $insertUserID = $db->prepare($insertString1);
         $insertUserID1->bindValue(':msize', $msize);
         $insertUserID1->bindValue(':mtype', $mtype);
         $insertUserID1->bindValue(':ingredient', $ingredient);
         $insertUserID1->bindValue(':lastID', $lastID);
         $insertUserID1->execute();
         
      }
   }
   $foodtype;
   $meals;
   try
   {
      $sizes = $db->query("SELECT * FROM measurementsize;");
      $types = $db->query("SELECT * FROM measurementtype;");
      $foodtypes = $db->query("SELECT * FROM foodtype;");
      $meals = $db->query("SELECT * FROM mealcategory;");
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
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            <select id="food" name="food"  required>
               <? 
               foreach($foodtypes as $food){
                  echo "<option value=$food[id]> $food[typename]</option>";
               }
               ?>
            </select>Food Type
            <select id="mealcat" name="mealcat"  required>
               <? 
               foreach($meals as $meal){
                  echo "<option value=$meal[id]> $meal[categoryname]</option>";
               }
               ?>
            </select>Meal Category</br></br>
            
         <div id="ingred">
            <select id="amount0" name="amount0"  required>
               <? 
               foreach($sizes as $size){
               echo "<option value=$size[id]> $size[measurementsize]</option>";
               }
               ?>
            </select>Amount
            <select id="meastype0" name="meastype0" required>
               <? 
                  foreach($types as $type){
                  echo "<option value=$type[id]> $type[measurementname]</option>";
                  }
               ?>
            </select>Measurement Type
            <input id="ingredient0" name="ingredient0" type="text" required>Ingredient</br></br>
         </div>
         <input name="add" type="button" value="Add another Ingredient" onclick="addItem()"></br></br>
         <textarea id="direct" name="direct" rows="4" cols="50" required>Enter directions here....</textarea></br></br>
         <input id="count" name="count" type="hidden" value="1">
         <input type="submit" value="Submit">
      </form>
   </div>
</body>
</html>