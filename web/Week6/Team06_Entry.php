<?php
echo "first";
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
echo "test";
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>ScriptureEntry</title>
</head>
<body>
   <form method="post" action="Team06_Display.php">
      <input name="book" type="text" required />Book</br></br>
      <input name="chpt" type="text" required />Chapter</br></br>
      <input name="verse" type="text" required />Verse</br></br>
      <textarea name="content" type="text" required>Content</textarea></br></br>
      <?php
         $count = 0;
         foreach($db->query('SELECT * FROM topics;') as $row){
            echo "<input type='checkbox' name='topic'" . $count . 
            " value='$row['name']'>";
            count++;
         }
         
      ?>
      <button type="submit" value="Submit">Submit</button>
   </form>
</body>
</html>