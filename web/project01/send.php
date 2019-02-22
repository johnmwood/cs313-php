<?php 

session_start();
require('../db/dbConnect.php'); 

// send email
// $title = htmlspecialchars($_POST["title"]); 
// $subject = htmlspecialchars($_POST["subject"]); 
// $body = htmlspecialchars($_POST["body"]); 

// $emails = $_POST["emails"]; 
// $emails = implode(', '); 

// $message = "<html><body><h3>$title</h3><p>$body</p></body></html>"; 
// $header = "From: jmw.home@gmail.com" . "\r\n";
// $header .= "MIME-Version: 1.0" . "\r\n";
// $header .= "Content-type:text/html;charset=UTF-8";

// mail($emails, $subject, $message, $header); 

// subtract credits for every email sent 
$db = connectPostgres(); 

$creditsSpent = count($_POST["emails"]); 
$update = "UPDATE users 
           SET credits = credits - :credits 
           WHERE id = :id"; 
$statement = $db->prepare($update);
$statement->bindValue(':credits', $creditsSpent, PDO::PARAM_INT);  
$statement->bindValue(':id', $_SESSION["userId"], PDO::PARAM_INT);  
$statement->execute(); 

header('Location: ./main.php'); 
die(); 

?> 