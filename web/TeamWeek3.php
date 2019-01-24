<?php
   $name = $_POST["name"];
   $email = $_POST["email"];
   $radio = $_POST["radio"];
   $checks = $_POST["chckbx"];
   $comment = $_POST["comment"];

   ?>
<!DOCTYPE html>
<html>
<head>
   <title>CS313</title>
</head>
<body>
   <header>Team AssignWeek3</header>
   
   
   <?
   foreach ($checks as $check)
   {
      $check_CL = htmlspecialchars($check);
      echo "<p>$check_CL</p><br/>";
   }
   ?>
   
   
</body>
</html>