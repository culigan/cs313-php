<?php
   require('DB_Connect.php');
   $db = connectToDB();
      

   $count = count($_POST);
   $sizeID = $_POST['size0'];
   $typeID = $_POST['type0'];
   $ingredID = $_POST['ingred0'];
   $direct = $_POST['direct'];
   $recID = $_POST['recid'];
   $count = ($count - 3) / 3;
   $stmt = "Update recipe set recipename = '" . $_POST['recipenam'] . "', directions = '" . $direct . "' where id = " . $recID . ";";
   $q = $db->query($stmt);
   /*$q->execute();
    ///$stmt->bindValue(':recipename', $_POST['recipenam']);
    //$stmt->execute();*/
    $recname = "recipenam";
    for($i = 0; $i < $count; $i++)
    {
      $tempsize = "size" . $i;
      $temptype = "type" . $i;
      $tempingred = "ingred" . $i;
      $ingredStmt = "Update recipeitems Set measurementsize_id = $_POST[$temp], ";
	   $ingredStmt .= "measurementtype_id = $_POST[$temptype], ingredient = '" . $_POST[$tempingred] . "' ";
      $ingredStmt .= "Where recipe_id = (Select id from recipe where recipename = '$_POST[recname]'); ";
      $updateStmt = $db->query($ingredStmt);
      //$updateStmt->execute();
    }

    echo "<span>Recipe Saved </span>";
    //usleep(5000);
    //header("Location: Project_2.php");

?>



<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Update</title>
   <link href="Project.css" rel="stylesheet">
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="ProjectJS.js"></script>
</head>
<body>
   <header>Updated</header>
   
</body>
</html>