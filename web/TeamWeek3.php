<?php
   $name = htmlspecialchars($_POST["name"]);
   $email =  htmlspecialchars($_POST["email"]);
   $radio =  htmlspecialchars($_POST["radio"]);
   $checks =  $_POST["chckbx"];
   $comment =  htmlspecialchars($_POST["comment"]);

   ?>
<!DOCTYPE html>
<html>
<head>
   <title>CS313</title>
</head>
<body>
   <header>Team AssignWeek3</header>
   
   <p>name: <? echo "$name"?></p>
   //<p>email: <? =$email?></p>
   //<p>major: <? =$radio ?></p>
   <?
   foreach ($checks as $check)
   {
      $check_CL = htmlspecialchars($check);
      echo "<p>$check_CL</p><br/>";
   }
   ?>
   //<p>comment:  <? =$comment?></p>
   
</body>
</html>