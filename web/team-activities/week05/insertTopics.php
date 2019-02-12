<?php 

require('../../db/db_connect.php');

$book = $_POST["book"]; 
$chapter = $_POST["chapter"]; 
$verse = $_POST["verse"]; 
$content = $_POST["content"]; 
$topics = $_POST["topics"]; 

$sql = "INSERT INTO scriptures VALUES (:book, :chapter, :verse, :content);";
$query = $db->prepare($sql);

$query->bindValue(':book', $book, PDO::PARAM_STR); 
$query->bindValue(':chapter', $chapter, PDO::PARAM_STR); 
$query->bindValue(':verse', $verse, PDO::PARAM_STR); 
$query->bindValue(':content', $content, PDO::PARAM_STR); 

$query->execute();

// $newId = $db->lastInsertId('scriptures_id_seq'); 
// foreach($topics as $topic) {

// }

?> 