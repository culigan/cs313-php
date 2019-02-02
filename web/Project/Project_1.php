<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Add a Recipe</title>
   <link href="Project.css" rel="stylesheet">
   <script src="ProjectJS.js"></script>
</head>
<body>
   
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

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
            echo $dbHost . $dbName;
         }
         catch(PDOException $ex)
         {
            echo 'ERROR!: ' . $ex->getMessage();
            die();
         }
         
         /*foreach($db->query('SELECT username, password FROM note_user') as $row)
         {
            echo 'user: ' . $row['username'];
            echo 'password: ' . $row['password'];
            echo '<br/>';
         }  */
      ?>
   <header>Add a Recipe</header>
   <div id='itemdiv'>
      <form id="formid" action="AssignWeek3_Confirm.php" method="post">
         <p></p></br>
         <div id="ingred">
            <select name="amount"  required>
               <option value="1/2">1/2</option>
            </select>Amount
            <select name="meastype" required>
               <option value="Cup">Cup</option>
            </select>Measurement Type
            <input name="ingredient" type="text" required>Ingredient</br></br>
         </div>
         <input name="add" type="button" value="Add another Ingredient" onclick="addItem()"></br></br>
         <textarea name="direct" rows="4" cols="50" required>Enter directions here....</textarea></br></br>
         <input type="submit" value="Submit">
      </form>
   </div>
</body>
</html>