<?php
   session_start();

   $signin;
   if(!isset($_SESSION['user'])){
      $signin = "SignIn";      
   }
   else
      $signin = "SignOut";
?>

<!DOCTYPE html>
<html>
<head>
   <title>CS313</title>
   <meta name="viewport" content="width=device-width, initial-scale1" />
   <link href="Project.css" rel="stylesheet">
   <script type="text/javascript" src="ProjectJS.js"></script>
</head>
<body>
   <div class="contain" id="container">
      <header>Family Recipes</header>
      <div class="menudiv" id="menu">
         <div id="item">
            <a href="ProjectHome.html">Home</a>
         </div>
         <div id="item">
            <a href="Project_1.php">Add Recipes</a>
         </div>
         <div id="item">
            <a href="Project_2.php">Edit Recipes</a>
         </div>
         <div id="item">
            <a href="Project_2.php">Search Recipes</a>
         </div>
         <div id="item">
            <a id="signin" href="Project_User.php?user:in" value="SignIn"><?php echo $signin; ?></a>
         </div>
      </div>
      <div id="textdiv">
         This will be an explanation of the website.
      </div>
   </div>
   <footer id="foot">
      <p>Created by: Collin Steel</p>
      <p>email:<a href="mailto:culigan@byui.edu.com">culigan@byui.edu"></a>.</p>
   </footer>
</body>
</html>