<?php 

$title = htmlspecialchars($_POST["title"]); 
$subject = htmlspecialchars($_POST["subject"]); 
$body = htmlspecialchars($_POST["body"]); 
$emails = htmlspecialchars($_POST["emails"]); 

$message = "<h3>$title</h3><p>$body</p>"; 

mail($emails, $subject, $message); 

header('Location: ./main.php'); 
die(); 

?> 