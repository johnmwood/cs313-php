<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../src/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Welcome</title>
</head>
<body>
  <?php require('./header.php'); ?>
  <h3>Welcome <?php echo $_SESSION["loginName"]; ?></h3>
  <div>
    <a style="margin: '0 10px'" class="wave-effect waves-light btn" href="./sendEmails.php">
      <h5>Send out email campaign</h5>
    </a> 
  </div>
</body>
</html>