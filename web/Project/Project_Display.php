
<?php
   session_start();

   if(!isset($_POST['user'])){
      header("Location: Project_User.php");
      die();
   }

   $id = $_GET['id'];

   require('DB_Connect.php');
   $db = connectToDB();

   $sizes = $db->query("SELECT * FROM MeasurementSize;");
    $types = $db->query("SELECT * FROM MeasurementType;");
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Recipe</title>
   <link href="Project.css" rel="stylesheet">
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="ProjectJS.js"></script>
</head>
<body>   
   <header>Recipe</header>
   <div id='recipediv'>
      <?php
         foreach($db->query('SELECT * FROM Recipe WHERE id = '. $id .';') as $row){

            echo "<p>";
            echo "<span class='spanrecipe'>";
            echo "<strong>$row[recipename]</strong>";
            echo "</br>";
            foreach($db->query('SELECT * FROM recipeitems WHERE recipe_id ='. $id .';') as $row1)
            {
               foreach($db->query('SELECT measurementsize FROM measurementsize WHERE id ='. $row1[measurementsize_id] . ';') as $row2){
                  echo $row2['measurementsize'];
                  echo " ";
               }
               foreach($db->query('SELECT measurementname FROM measurementtype WHERE id ='. $row1[measurementtype_id] . ';') as $row3){
                  echo $row3[measurementname];
                  echo " ";
               }
               echo $row1[ingredient];
               echo "</br>";                   
            }
            echo "</span>";
            echo $row[directions] . ";";
            echo "</p>";
         }
      ?>
   </div>
</body>
</html>