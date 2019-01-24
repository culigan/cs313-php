<?php
   $name = $_POST["name"];
   $email = $_POST["email"];
   $radio = $_POST["radio"];
   $check = $_POST["chckbx"];
   $comment = $_POST["comment"];

   ?>
<!DOCTYPE html>
<html>
<head>
   <title>CS313</title>
</head>
<body>
   <header>Team AssignWeek3</header>
   
   <p>name: <? echo $name?></p>
   <p>email: <? echo $email?></p>
   <p>major: <? echo $radio ?></p>
   <?
   foreach ($check as $check)
   {
      &check_CL = htmlspecialchars($check);
      echo "<p>$check_CL</p><br/>";
   }
   
   echo $check; ?>
   <p>comment: <? echo $comment?></p>
   
</body>
</html>