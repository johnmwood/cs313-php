<?php 
require("../../db/db_connect.php");

$username = $_POST["username"]; 
$password = $_POST["password"];

function checkLoginCredentials($username, $password) {
  $sql = "SELECT users.username, users.password 
          FROM users
          WHERE users.username = :username AND users.password = :password";

  $query = $db->prepare($sql); 
  $query->bindValue(':username', $username, PDO::PARAM_STR);
  $query->bindValue(':password', $password, PDO::PARAM_STR);

  $query->execute();

  $results = $query->fetch(PDO::FETCH_ASSOC); 

  if ($results) {
    $GLOBALS["loginName"] = $username; 
    header("Location: main.php"); 
    die();
  } else {
    header("Location: login.php");
    die();
  }
} 

try {
  checkLoginCredentials($username, $password); 
} catch (PDOException $ex) {
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?> 