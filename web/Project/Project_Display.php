
<?php

$db;

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
<body >   
   <header>Recipe</header>
   <div id='recipediv'>
      <?php
         echo $_POST('id');
          foreach($db->query('SELECT * FROM Scriptures WHERE id ='.$_POST['id'].';') as $row)
            {

                echo "<p>";
                //scripture
                echo "<span class='scripture'>";
                echo $row[recipename];
                echo "</br>";
                foreach($db->query('SELECT * FROM recipeitems WHERE recipe_id ='.$_POST['id'].';') as $row1)
               {
                  echo $db->query('SELECT measurementsize FROM measurementsize WHERE id ='. $row1[measurementsize_id] . ';');
                  echo " ";
                  echo $db->query('SELECT measurementname FROM measurementtype WHERE id ='. $row1[measurementtype_id] . ';');
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