<?php 

require('../../db/db_connect.php');

try {
  $book = $_POST["book"]; 
  $chapter = $_POST["chapter"]; 
  $verse = $_POST["verse"]; 
  $content = $_POST["content"]; 
  $topics = $_POST["topics"]; 

  // insert new scripture 
  $sql = "INSERT INTO scriptures(book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content);";
  $query = $db->prepare($sql);

  $query->bindValue(':book', $book, PDO::PARAM_STR); 
  $query->bindValue(':chapter', $chapter, PDO::PARAM_STR); 
  $query->bindValue(':verse', $verse, PDO::PARAM_STR); 
  $query->bindValue(':content', $content, PDO::PARAM_STR); 

  $query->execute();

  // insert scripture topics 
  $newId = $db->lastInsertId('scriptures_id_seq'); 
  $sql = "INSERT INTO scriptureTopics VALUES (" . $newId . ", :topic)";

  foreach($topics as $topic) {
    $query = $db->prepare($sql); 
    $query->bindValue(':topic', $topic, PDO::PARAM_INT); 
    $query->execute(); 
  }

  // redirect 
  header('Location: displayScriptures.php');
  die(); 
} catch(PDOException $ex) { 
  echo 'Error!: ' . $ex->getMessage();
  echo 'RIP'; 
  die();
}

?> 