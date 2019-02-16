<?php
   require('DB_Connect.php');
   $db = connectToDB();
   session_start();

   $signin;
   if(!isset($_SESSION['user'])){
      header("Location: Team_SignIn.php");     
   }
   else
      $signin = "SignOut";
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Welcome</title>
   <link href="Team.css" rel="stylesheet">
   <script src="Team.js"></script>
</head>
<body id="userbody">   
   <header id="user">Welcome Page</header>
   <div id='userdiv'>
      <label><a href="Team_SignIn.php" value="Sign In" >Sign In</a></label>
   </div>
</body>
</html>