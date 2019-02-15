<?php 

?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../src/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Add Clients</title>
</head>
<body>
  <?php require('../header.php'); ?> 
  <div class="row">
    <form class="" method="POST" action="../processing/confirmClients.php">
      <h5>Fill out client(s) information:</h5>
      <div class="row">
        <div class="input-field col s12">
          <input id="names" type="text" class="validate" name="names">
          <label class="active" for="names">Client Names</label> (Comma separated) 
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="emails" type="text" class="validate" name="emails">
          <label class="active" for="state">Emails</label> (Comma separated)
        </div> 
      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">
        Confirm Survey Send
      </button>
    </form>  
  </div>
</body>
</html>