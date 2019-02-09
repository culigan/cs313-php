<?php
   session_start();

   require('DB_Connect.php');
   $db = connectToDB();

   echo "connect";
   $username;
   $password;
   $firstname;
   $lastname;
   if(isset($_SESSION['user']))
   {
      session_destroy();
      header("Location: ProjectHome.php");
   }
   echo "session";
   if(isset($_POST['fname']))
   {
      echo "in session" . $username . $password . $firstname . $lastname;
      $username = htmlspecialchars($_POST['uname']);
      $password = htmlspecialchars($_POST['pname']);
      $fisrtname = htmlspecialchars($_POST['fname']);
      $lastname = htmlspecialchars($_POST['lname']);
      $queryStmt = "select * From user_table where firstname = :firstname and lastname = :lastname and username = :username and password = :password;";
      $queryStmt = $db->prepare($queryStmt);
      $queryStmt->bindValue(':username', $username);
      $queryStmt->bindValue(':first', $firstname);
      $queryStmt->bindValue(':last', $lastname);
      $queryStmt->bindValue(':password', $password);
      $queryStmt->execute();
      $results = $queryStmt->fetchAll(PDO::FETCH_ASSOC);

      if(count($results) > 0)
         echo "The User Alredy Exists!";
      else
      {
         echo "in session 2";
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
      $queryStmt = "select username, password From user_table where username = :username and password = :password;";
      $queryStmt = $db->prepare($queryStmt);
      $queryStmt->bindValue(':username', $username);
      $queryStmt->bindValue(':password', $password);
      $queryStmt->execute();
      $results = $queryStmt->fetchAll(PDO::FETCH_ASSOC);
      
      if(count($results) > 0)
      {
         $_SESSION['user'] = $username;
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
      <form id="formid" action="Project_User.php" method="post">
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