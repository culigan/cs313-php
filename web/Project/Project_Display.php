﻿
<?php

$db;
$id = $_GET['id'];
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

    $sizes = $db->query("SELECT * FROM MeasurementSize;");
    $types = $db->query("SELECT * FROM MeasurementType;");
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
            $search = $db->prepare('SELECT * FROM recipeitems WHERE recipe_id = :recipe_id');
            echo "here";
            $search->bindValue(':recipe_id', $id, PDO::PARAM_STR);
            echo "here1";
            $search->execute();
            echo "here2";
            $rec_id = $search->fetchAll(PDO::FETCH_ASSOC);
            echo $rec_id;
            foreach($rec_id as $row1);//$db->query('SELECT * FROM recipeitems WHERE recipe_id ='. $id .';')
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