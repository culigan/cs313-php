<!DOCTYPE html>
<html>
<head>
   <title>CS313</title>
   <meta name="viewport" content="width=device-width, initial-scale1" />
   <link href="AssignWeek2.css" rel="stylesheet">
   <script type="text/javascript" src="AssignWeek2.js"></script>
</head>
<body>
   <header>CS313 Collin Steel</header>
   
   <?php
      echo $_POST['name'];
      echo "mailto: <a href=$_POST['email']>$_POST['email']</a><br />";
      echo $_POST['radio'];
      echo $_POST['comment'];

   ?>
</body>
</html>