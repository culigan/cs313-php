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
   <div id="container">
      <div id="FirstDiv">
         <a href="AssignWeek2_2.html">Assignments</a>
      </div>
      <div id="SecondDiv">
         <p>
            I work at <a href="www.powerteq.com">Powerteq</a> as a Test Engineer.  It has been a great place
            to work for the past 16 years.
         </p>
      </div>
      <div id="ThirdDiv">
         <img src="me.jpg" alt="Pictur of Me" />
      </div>
   </div>
   <button id="but" onclick="clickAlert()">Push</button><br />
   The time is:
   <?php
    $time = $_SERVER['REQUEST_TIME'];
    print 'test';
   ?>
</body>
</html>