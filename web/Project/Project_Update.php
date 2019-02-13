<?php
   echo "here";
   echo count($_POST);
   $count = count($_POST);
   /*/$count = ($count - 1) / 3;
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
    header("Location: Project_2.php");*/

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