<?php

$db;
$book = $_POST['book'];
$chpt = $_POST['chpt'];
$verse = $_POST['verse'];
$content = $_POST['content'];


try
{
    $dbUrl = getenv('DATABASE_URL');
    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
    $insertStmt = $db->exec("Insert into scriptures (book, chapter, verse, content) values ('" . $book . "', '" . $chpt . "', '" . $verse . "', '" .$content . "');");
   
    /*$insertStmt = $db->prepare("Insert into scriptures (book, chapter, verse, content) values (:book, :chpt, :verse, :content);");
    $insertIn = $this->pdo->prepare($insertStmt);
    $insertIn->bindValue(':book',$book);
    $insertIn->bindValue(':chpt',$chpt);
    $insertIn->bindValue(':verse',$verse);
    $insertIn->bindValue(':content',$content);
    $insertIn->execute();*/

   $newId = $db->lastInsertId('scriptures_id_seq');
   
   if(isset($_POST['topic0'])){
      $topic = $_POST['topic0'];   
      echo $topic;
      //$inserttop = $db-exec("insert into scripture_topic_link (scripture_id, topics_id) values ( '" . $newId . "', 1);");
      $inserttop = $db-prepare("insert into scripture_topic_link (scripture_id, topics_id) values ( :newId, 1);");
      $inserttop->bindValue(':newId', $newId, PDO::PARAM_INT);
      $inserttop->execute();/*//*/
   }
   if(isset($_POST['topic1'])){
      $topic1 = $_POST['topic1'];
      echo $topic1;
      $inserttop1 = $db->exec("insert into scripture_topic_link (scripture_id, topics_id) values ( '" . $newId . "', 2);");
      /*$inserttop1 = $db->prepare("insert into scripture_topic_link (scripture_id, topics_id) values ( :newId, 2);");
      $inserttop1->bindValue(':newId', $newId);
      $inserttop1->execute();//*/
   }
   if(isset($_POST['topic2'])){
      $topic2 = $_POST['topic2'];
      echo $topic2;
      $inserttop2 = $db->exec("insert into scripture_topic_link (scripture_id, topics_id) values ('" . $newId . "', 3);");
      /*$inserttop2 = $db->prepare("insert into scripture_topic_link (scripture_id, topics_id) values ( :newId, 3);");
      $inserttop2->bindValue(':newId', $newId);
      $inserttop2->execute();//*/
   }

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Scriptures Displayed</title>
</head>
<body>
   
      <?php
         $count = 0;
         foreach($db->query('SELECT * FROM scriptures;') as $row){
            echo $row['book'] . " " . $row['chapter'] . " " . $row['verse'] . " ";
            foreach($db->query("SELECT t.name from topics t join scripture_topic_link stl on t.id = stl.topics_id where stl.scripture_id = '" . $row['id'] . "';") as $row1){
               echo $row1['name'] . " ";
               }
               echo "</br>";
         }
         echo "</br>";
         /**/
      ?>
      
</body>
</html>