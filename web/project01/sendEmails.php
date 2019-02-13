<?php 
session_start(); 
require("../db/db_connect.php");

  $username = 'test'; # TODO: set up query for username with login
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../src/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Home</title>
</head>
<body>
  <?php require("./header.php"); ?> 
  <h4>Welcom <?php echo $username . "!"; ?></h4>
  <h3>Send out a survey</h3>
  <div class="row">
    <form class="" method="POST" action="confirmation.php">
      <h5>Fill out email information:</h5>
      <div class="row">
        <div class="input-field col s6">
          <input id="title" type="text" class="validate" name="title">
          <label class="active" for="title">Title</label>
        </div>
        <div class="input-field col s6">
          <input id="subject" type="text" class="validate" name="subject">
          <label class="active" for="subject">Subject</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="address" type="text" class="validate" name="body">
          <label class="active" for="body">Body</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="emails" type="text" class="validate" name="emails">
          <label class="active" for="state">emails</label> (Comma separated)
        </div> 
      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">
        Confirm Survey Send
      </button>
    </form>  
  </div>
</body>
</html>