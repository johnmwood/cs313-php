<?php

session_start();
require("../db/dbConnect.php");

function splitByCommas($text) {
  return explode(', ', $text); // php dumb function name 
}

function finalizeClients($emails, $names) {
  // must have equal number of client names to emails 
  if (count($names) != count($emails)) {
    header('Location: ./addClients.php');
    die();
  }

  // validate emails 
  $email_re = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';

  $clients = array(); // array of clients with validated emails 

  // one email is not an array and needs to be handled individually 
  if (count($emails) == 1 && preg_match($email_re, $emails)) {
    $clients["emails"] = $emails; 
    $clients["names"] = $names; 
  } else {
    for($i=0; $i < count($emails); $i++) {
      if(preg_match($email_re, $emails[$i])) {
        $clients["emails"] = $emails[$i]; 
        $clients["names"] = $names[$i]; 
      }
    }
  }

  return $clients; 
}

function writeClientsToPostgres($clients) {
  
  try {
    // user not logged in 
    if (!$_SESSION["userId"]) {
      header('Location: ./login.php');
      die();
    }
  
    $db = connectPostgres();
  
    $sql = "INSERT INTO clients(name, email, user_id) VALUES(:name, :email, " . $_SESSION["userId"] . ")"; 
    foreach($clients as $client) {
      $statement = $db->prepare($sql); 
      $statement->bindValue(':name', $client["names"], PDO::PARAM_STR); 
      $statement->bindValue(':email', $client["emails"], PDO::PARAM_STR); 

      $statement->execute(); // write to db 
    }
  } catch(PDOException $ex) { 
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}

$names = htmlspecialchars($_POST["names"]);
$emails = htmlspecialchars($_POST["emails"]); 

$names = splitByCommas($names); 
$emails = splitByCommas($emails); 

$clients = finalizeClients($emails, $names);

writeClientsToPostgres($clients);

// header('Location: ./main.php');
// die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3>
  <?php 
    foreach($clients as $client) {
      echo "<h3>Name: " . $client["names"] . "</h3>";
      echo "<h3>Email: " . $client["emails"] . "</h3>";
    }
  ?>
  </h3>
</body>
</html>
