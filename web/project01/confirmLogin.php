<?php 
require("../../db/db_connect.php");

$username = $_POST["username"]; 
$password = $_POST["password"];

function checkLoginCredentials($username, $password) {
  $sql = "SELECT username, password 
          FROM users
          WHERE username = :username AND password = :password";

  $query = $db->prepare($sql); 
  $query->bindValue(':username', $username, PDO::PARAM_STR);
  $query->bindValue(':password', $password, PDO::PARAM_STR);

  $query->execute();

  $results = $query->fetch(); 

  if ($results) {
    $GLOBALS["username"] = $username; 
    header("Location: main.php"); 
  } else {
    header("Location: login.php");
  }
} 

checkLoginCredentials($username, $password); 

?> 