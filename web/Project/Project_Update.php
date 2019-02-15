<?php
   require('DB_Connect.php');
   $db = connectToDB();
      

   $count = count($_POST);
   $sizeID = $_POST['size0'];
   $typeID = $_POST['type0'];
   $ingredID = $_POST['ingred0'];
   $direct = $_POST['direct'];
   echo $ingredID;
   $recID = $_POST['recid'];
   echo $recID;
   echo $count;
   $count = ($count - 3) / 3;
   echo $count;
   $stmt = "Update recipe set recipename = '" . $_POST['recipenam'] . "', directions = '" . $direct . "' where id = " . $recID . ";";
   echo $stmt;
   $q = $db->query($stmt);
   /*$q->execute();
    ///$stmt->bindValue(':recipename', $_POST['recipenam']);
    //$stmt->execute();*/
    echo "here";
    echo $_POST['size0'];
    for($i = 0; $i < $count; $i++)
    {
      $ingredStmt = "Update recipeitems Set measurementsize_id = $_POST['size$i], ";
	   $ingredStmt .= "measurementtype_id = $_POST['type$i'], ingredient = '$_POST['ingred$i']' ";
      $ingredStmt .= "Where recipe_id = (Select id from recipe where recipename = '$_POST['recipenam'])'; ";
      //$updateStmt = $db->query($ingredStmt);
      //$updateStmt->execute();
    }

    echo "<span>Recipe Saved </span>";
    usleep(5000);
    header("Location: Project_2.php");

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