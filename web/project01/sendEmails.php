<?php 
  session_start(); 
  include_once("../db/dbConnect.php");

  $db = connectPostgres(); 

  $sql = "SELECT id, name, email
          FROM clients 
          WHERE user_id = :user_id";
   
  $statement = $db->prepare($sql); 
  $statement->bindValue(':user_id', $_SESSION["user_id"], PDO::PARAM_INT); 
  $statement->execute(); 

  $results = $statement->fetchAll(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../src/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Send Emails</title>
</head>
<body>
  <?php require("./header.php"); ?> 
  <div class="row">
    <form class="" method="POST" action="./home.php">
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
      <h5>Clients: </h5>
      <div class="row">
        <?php 
          foreach($results as $row) {
            echo "<p>
                    <label>
                      <input type='checkbox' class='filled-in' name='" . $row["name"] . "' />
                      <span>" . $row["name"] . "-" . $row["email"] . "</span>
                    </label>
                  </p></br>";
          }
        ?>
      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">
        Confirm Survey Send
      </button>
    </form>  
  </div>
</body>
</html>