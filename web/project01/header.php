<?php
  // define('__DIR__', '/app/web/project01/'); // should be defined in a config file 
                                         // initialized at the start of the application
  
  session_start();
  require("../db/dbConnect.php");

  $db = connectPostgres(); 

  // $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
  $userId = $_SESSION["userId"];

  if ($userId) {
    $query = $db->prepare("SELECT credits
                           FROM users
                           WHERE id = :id"); 
    $query->bindValue(':id', $userId, PDO::PARAM_STR); 
    $query->execute(); 
  
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $credits = $row["credits"];
  }

  $homePath = ($userId ? "./main.php" : "./login.php");
?>
<nav>
<div class="nav-wrapper teal lighten-2">
  <a href="<?php echo $homePath; ?>" class="brand-logo left">
    <img src="<?php echo $root . '../images/evergreen.png'; ?>" alt="">Emaily
  </a>
  <ul id="nav-mobile" class="right">
    <?php 
      if ($userId) {
        echo "<li><h5>" . $userId . "</h5></li>";
        echo "<li className='btn-flat blue' style='margin: \"0 10px\"'>
                  <a class='wave-effect waves-light btn'>
                    User Credits: " . $credits . 
                  "</a>
              </li>";
      }
    ?>
  </ul>
</div>
</nav>