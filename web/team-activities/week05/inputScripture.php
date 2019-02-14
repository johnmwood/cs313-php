<?php require '../../db/dbConnect.php'; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="insertTopics.php" method="post">
    Book: <input type="text" name="book" id=""><br>
    Chapter: <input type="text" name="chapter" id=""><br>
    Verse: <input type="text" name="verse" id=""><br>
    Content: <textarea name="content" id="" cols="30" rows="10"></textarea><br>

    <?php
    
    $sql = 'SELECT topics.id, topics.name FROM topics'; 
    $res = $db->query($sql); 
    
    foreach($res as $row) {
      echo $row["name"] . ": <input type=\"checkbox\" name=\"topics[]\" value=\"" . $row["id"] . "\" ><br>";
    }
    
    ?>
    <input type="submit">
  </form>  
</body>
</html>