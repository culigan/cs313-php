﻿<?php
   session_start();

   require('DB_Connect.php');
   $db = connectToDB();

   $username;
   $password;
   if(isset($_POST['user'])
   {
      $username = $_POST['user'];
      $password = $_POST['pass'];
      
   }
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>User Login</title>
   <link href="Project.css" rel="stylesheet">
   <script src="ProjectJS.js"></script>
</head>
<body id="userbody">   
   <header id="user">User Login</header>
   <div id='userdiv'>
      <form id="formid" action="GetUserData.php" method="post">
         <input name="user" type="text" placeholder="username" required></br>
         <label>Username</label></br>
         <input name="pass" type="password" placeholder="password"  required></br>
         <label>Password</label></br>
         <label><a href="Project_create.html" value="Create User" >Create User</a></label>
         <input type="submit" value="SignIn">
      </form>
   </div>
</body>
</html>