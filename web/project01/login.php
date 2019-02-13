<?php require("../../db/db_connect.php"); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../src/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Login</title>
</head>
<body>
  <?php require('header.php'); ?>
  <h3>Please login</h3>
  <div class="row">
    <form class="" method="POST" action="confirmLogin.php">
      <div class="row">
        <div class="input-field col s12">
          <input id="username" type="text" class="validate" name="username">
          <label class="active" for="username">Username</label>
        </div>
      </div> 
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="text" class="validate" name="password">
          <label class="active" for="state">password</label>
        </div> 
      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">
        Login
      </button>
    </form> 
</body>
</html>