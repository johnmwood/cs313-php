<?php

session_start(); 
require('../db/dbConnect.php');

$passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$db = connectPostgres(); 
$sql = "INSERT INTO users(username, password, credits) VALUES(:username, '" . $passwordHash . "', :credits)"; 

$query = $db->prepare($sql);
$query->bindValue(':username', $_POST["username"], PDO::PARAM_STR); 
$query->bindValue(':credits', $_POST["credits"], PDO::PARAM_INT); 

$query->execute(); 

header('Location: ./login.php');
die(); 

?>