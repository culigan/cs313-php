<?php
   $name = $_POST['name']);
   $email = $_POST['email'];
   $radio = $_POST['radio'];
   $check = $_POST['chckbx'];
   $comment = $_POST['comment'];

   ?>
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
   
   <p>name: <? echo $name?></p>
   <p>email: <? echo $email?></p>
   <p>major: <? echo $radio ?></p>
   <?
   foreach ($check as $check)
   {
      &check_CL = htmlspecialchars($check);
      echo "<p>$check_CL</p><br/>";
   }
   echo $check 
   <p>comment: <? echo $comment?></p>
</body>
</html>