<?php

session_start();

   if(!isset($_SESSION['user'])){
      header("Location: Project_User.php");
      die();
   }

   $id = $_GET['id'];

   require('DB_Connect.php');
   $db = connectToDB();
    $sizes = $db->query("SELECT * FROM measurementsize;");
    $types = $db->query("SELECT * FROM measurementtype;");
    $rname = $db->query("SELECT recipename FROM recipe where id = $id;");
    $search = "SELECT ri.id as rid, ri.ingredient as ingredient, ms.measurementsize as msize,";
    $search .= "mt.measurementname as mtype FROM recipeitems ri join measurementsize ";
    $search .= "ms on ri.measurementsize_id = ms.id join measurementtype mt on ";
    $search .= "ri.measurementtype_id = mt.id  where recipe_id = $id;";
    $items = $db->query($search);
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
      <form id="searchforum" action="Project_Update.php" method="post">         
         <input name="recipename" type="text"><?php $rname[recipename] ?></br></br>
         <?php
            foreach($items as $item)
            {
               echo "<select name='size$item[rid]' value='$item[msize]' textcontent='$item[msize]'><option></option>";             
               foreach($sizes as $size){
                  if($size[measurementsize] == $item[msize])
                     echo "<option value='$size[id]' selected> $size[measurementsize]</option>";
                  else
                     echo "<option value='$size[id]'> $size[measurementsize]</option>";                     
               }
            
               echo "</select>Measurement Size";
               echo "<select name='type$item[rid]' value='$item[mtype]' textcontent='$item[mtype]'><option></option>";
             
               foreach($types as $type){
                  if($type[measurementname] == $item[mtype])
                     echo "<option value='$type[id]' selected> $type[measurementname]</option>";
                  else
                     echo "<option value='$type[id]'> $type[measurementname]</option>";
                     
               }
            
               echo "</select>Measurement Type";
               echo "<input name='ingred$item[rid]' type='text' value='$item[ingredient]'>Ingredient</br></br>";
            }
         ?>
         <input type="submit" value="Save Changes">
      </form>      
   </div>
</body>
</html>