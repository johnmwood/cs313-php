<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../src/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <?php require('./header.php'); ?>
  <h3>Please login</h3>
  <div class="row">
    <form class="" method="POST" action="./createUser.php">
      <div class="row">
        <div class="input-field col s6">
          <input id="username" type="text" class="validate" name="username">
          <label class="active" for="username">New Username</label>
        </div>
      </div> 
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" class="validate" name="password">
          <label class="active" for="password">New Password</label>
        </div> 
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="credits" type="number" class="validate" name="credits">
          <label class="active" for="credits">Credits</label>
        </div> 
      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">
        Create User
      </button>
    </form> 
  </div> 
</body>
</html>