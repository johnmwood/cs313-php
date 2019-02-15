<?php 

?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
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