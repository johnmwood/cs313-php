<?php 
session_start(); 
require("../../db/dbConnect.php");

function checkLoginCredentials($username, $password) {
  $db = connectPostgres(); 

  $sql = "SELECT users.id, users.username, users.password 
          FROM users
          WHERE users.username = :username AND users.password = :password";

  $query = $db->prepare($sql); 
  $query->bindValue(':username', $username, PDO::PARAM_STR);
  $query->bindValue(':password', $password, PDO::PARAM_STR);

  $query->execute();

  $results = $query->fetch(PDO::FETCH_ASSOC); 

  if ($results["username"]) {
    $_SESSION["userId"] = $results["id"];
    $_SESSION["loginName"] = $results["username"];  
    header("Location: ../main.php"); 
    die();
  } else {
    header("Location: ../login.php");
    die();
  }
} 

try {
  $username = $_POST["username"]; 
  $password = $_POST["password"];

  checkLoginCredentials($username, $password); 
} catch (PDOException $ex) {
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?> 