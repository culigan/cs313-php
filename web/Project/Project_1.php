
<?php

   session_start();

   if(!isset($_POST['user'])){
      header("Location: Project_User.php");
      die();
   }

   $require('DB_Connect.php');
   $db = connectToDB;

   $sizes = $db->query("SELECT * FROM MeasurementSize;");
   $types = $db->query("SELECT * FROM MeasurementType;");
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

         <div id="ingred">
            <select id="amount0" name="amount0"  required>
               <? 
               foreach($sizes as $size){
               echo "<option> $size[measurementsize]</option>";
               }
               ?>
            </select>Amount
            <select id="meastype0" name="meastype0" required>
               <? 
                  foreach($types as $type){
                  echo "<option> $type[measurementname]</option>";
                  }
               ?>
            </select>Measurement Type
            <input id="ingredient0" name="ingredient0" type="text" required>Ingredient</br></br>
         </div>
         <input name="add" type="button" value="Add another Ingredient" onclick="addItem()"></br></br>
         <textarea name="direct" rows="4" cols="50" required>Enter directions here....</textarea></br></br>
         <input type="submit" value="Submit">
      </form>
   </div>
</body>
</html>