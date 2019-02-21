<?php 

require('../db/dbConnect.php'); 

// send email
$title = htmlspecialchars($_POST["title"]); 
$subject = htmlspecialchars($_POST["subject"]); 
$body = htmlspecialchars($_POST["body"]); 
$emails = $_POST["emails"]; 

$message = "<h3>$title</h3><p>$body</p>"; 

foreach($emails as $email) {
  mail(htmlspecialchars($email), $subject, $message); 
}

// subtract credits for every email sent 
$db = connectPostgres(); 

$id = $_SESSION['userId']; 
$creditsSpent = count($emails); 
$update = "UPDATE users 
           SET users.credits = users.credits - $creditsSpent 
           WHERE users.id = $id"; 
$statement = $db->prepare($update); 
$statement->execute(); 

header('Location: ./main.php'); 
die(); 

?> 