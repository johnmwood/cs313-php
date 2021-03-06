<?php 
try {
  $dbOpts = parse_url(getenv('DATABASE_URL'));

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  echo 'Error! ' . $ex->get_message(); 
  die(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Query</title>
</head>
<body>
  <?php 
    $book = $_GET["selectedBook"];
    $query = $db->prepare("SELECT book, chapter, verse, content
                           FROM scriptures
                           WHERE book = :book");
  
    $query->bindValue(':book', $book, PDO::PARAM_STR);
    $query->execute(); 

    $scriptures = $query->fetchAll(); 
    // $query->bindValue(':id', $id, PDO::PARAM_INT);
  
    foreach($scriptures as $scripture)
    {
      $html_chunk = "<b>" . $scripture["book"] . " </b>" .
                    "<b>" . $scripture["chapter"] . ":</b>" . 
                    "<b>" . $scripture["verse"] . "</b>: " . 
                    "\"" . $scripture["content"] . "\" </br>";

      echo $html_chunk; 
    }
  ?>
</body>
</html>