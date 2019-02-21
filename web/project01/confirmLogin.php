<?php 
ini_set('session.cookie_lifetime', 60 * 60);
session_start(); 
require("../db/dbConnect.php");

function checkLoginCredentials($username, $password) {
  
  $db = connectPostgres(); 
  $sql = "SELECT users.id, users.username, users.password 
          FROM users
          WHERE users.username = :username";

  $query = $db->prepare($sql); 
  $query->bindValue(':username', $username, PDO::PARAM_STR);
  $query->execute();

  $results = $query->fetch(PDO::FETCH_ASSOC); 
  
  // verify db password vs. user hashed password 
  if (password_verify($password, $results["password"])) {
    $_SESSION["userId"] = $results["id"];
    $_SESSION["loginName"] = $results["username"]; 
    header("Location: ./main.php");
    die(); 
  } else {
    // $output = "<p>username: $username </br> 
    //            password: $password </br>
    //            hashedPassword: $passwordHash </br>
    //            results['username']: " . $results["username"] . "</br>
    //            results['password']: " . $results["password"] . "</p></br>";

    // echo "<html><body>" . $output . "</body></html>";
    header("Location: ./login.php"); 
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