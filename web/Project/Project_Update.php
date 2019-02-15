<?php
   require('DB_Connect.php');
   $db = connectToDB();
      

   $count = count($_POST);
   echo $_POST['recitemid0'];
   $typeID = $_POST['type0'];
   $ingredID = $_POST['ingred0'];
   $direct = $_POST['direct'];
   $recID = $_POST['recid'];
   $count = ($count - 3) / 4;
   $stmt = "Update recipe set recipename = '" . $_POST['recipenam'] . "', directions = '" . $direct . "' where id = " . $recID . ";";
   $q = $db->query($stmt);
    $recname = "recipenam";
    $qzs = $db->query("Select id from recipe where recipename = '$_POST[$recname]';");
    $recipeID;
    foreach($qzs as $qz)
      $recipeID = $qz[id];
   
   for($i = 0; $i < $count; $i++)
    {
      $tempsize = "size" . $i;
      $temptype = "type" . $i;
      $tempingred = "ingred" . $i;
      $temprecid = "recitemid" . $i;
      $ingredStmt = "Update recipeitems Set measurementsize_id = $_POST[$tempsize], ";
	   $ingredStmt .= "measurementtype_id = $_POST[$temptype], ingredient = '$_POST[$tempingred]' ";
      $ingredStmt .= "Where recipe_id = $recipeID and id = $_POST[$temprecid]; ";
      $updateStmt = $db->query($ingredStmt);
    }

    echo "<span>Recipe Saved </span>";
    header("Location: Project_2.php?updated=updated");

?>

