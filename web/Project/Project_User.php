<?php
   session_start();

   require('DB_Connect.php');
   $db = connectToDB();

   $username;
   $password;
   $firstname;
   $lastname;
   if(isset($SESSION['user']))
   {
      session_destroy();
      header("Location: ProjectHome.php");
   }
   
   if(isset($_POST['fname']))
   {
      $username = $_POST['uname'];
      $password = $_POST['pname'];
      $fisrtname = $_POST['fname'];
      $lastname = $_POST['lname'];
      $queryStmt = "select * From user_table where firstname = :firstname and lastname = :lastname and username = :username password = :password;";
      $queryStmt = $db->prepare($queryStmt);
      $queryStmt->bindValue(':username', $username);
      $queryStmt->bindValue(':first', $firstname);
      $queryStmt->bindValue(':last', $lastname);
      $queryStmt->bindValue(':password', $password);
      $queryStmt->execute();

      if(count($queryStmt) > 0)
         echo "The User Alredy Exists!";
      else
      {
         $insertStmt ="Insert into User_Table (username, firstname, lastname) values (:username, :first, :last, :password);";
         $insertIn = $db->prepare($insertStmt);
         $insertIn->bindValue(':username', $username);
         $insertIn->bindValue(':first', $firstname);
         $insertIn->bindValue(':last', $lastname);
         $insertIn->bindValue(':password', $password);
         $insertIn->execute();
      }
      
   }
   if(isset($_POST['user']))
   {
      $username = $_POST['user'];
      $password = $_POST['pass'];
      $queryStmt = "select * From user_table where username = :username password = :password;";
      $queryStmt = $db->prepare($queryStmt);
      $queryStmt->bindValue(':username', $username);
      $queryStmt->bindValue(':first', $firstname);
      $queryStmt->bindValue(':last', $lastname);
      $queryStmt->bindValue(':password', $password);
      $queryStmt->execute();
      
      if(count($queryStmt) > 0)
      {
         $SESSION['user'] = $username;
         header("Location: ProjectHome.php");         
      }   
      else
         header("Location: Project_create.php");
      
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