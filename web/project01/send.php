<?php 

require('../db/dbConnect.php'); 

// send email
$title = htmlspecialchars($_POST["title"]); 
$subject = htmlspecialchars($_POST["subject"]); 
$body = htmlspecialchars($_POST["body"]); 
$emails = $_POST["emails"]; 

$message = "<h3>$title</h3><p>$body</p>"; 
$header = "From: jmw.home@gmail.com"; 

foreach($emails as $email) {
  mail(htmlspecialchars($email), $subject, $message, $header); 
}

// subtract credits for every email sent 
$db = connectPostgres(); 

$creditsSpent = count($emails); 
$update = "UPDATE users 
           SET credits = credits - :credits 
           WHERE id = :id"; 
$statement = $db->prepare($update);
$statement->bindValue(':credits', $creditsSpent, PDO::PARAM_INT);  
$statement->bindValue(':id', $_SESSION["userId"], PDO::PARAM_INT);  
$statement->execute(); 

$output = "Credits spent: $creditsSpent</br>"; 
foreach($emails as $email) { 
  $output .= "Email: $email </br>";
}

echo "<html><body><p>" . $output . "</p></body></html>";

// header('Location: ./main.php'); 
// die(); 

?> 