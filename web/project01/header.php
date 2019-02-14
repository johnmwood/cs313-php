<?php
  require("../db/dbConnect.php");

  $db = connectPostgres(); 

  $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
  $root = $_SERVER["DOCUMENT_ROOT"]; 
  $loginName = $GLOBALS["loginName"];

  if ($loginName) {
    $query = $db->prepare("SELECT credits
                           FROM users
                           WHERE username = :username"); 
    $query->bindValue(':username', $loginName, PDO::PARAM_STR); 
    $query->execute(); 
  
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $credits = $row["credits"];
  }
?>
<nav>
<div class="nav-wrapper teal lighten-2">
  <a href="home.php" class="brand-logo">
    <img src="<?php echo $root . '../images/evergreen.png'; ?>" alt="">Emaily
  </a>
  Login name: <?php echo $loginName; ?>
  <ul id="nav-mobile" class="right">
    <?php 
      if ($loginName) {
        echo "<li>
                <div>" . $loginName . "</div>
              </li>";
        echo "<li className=\"btn-flat blue\">
                <div>
                  User Credits: " . $credits . "
                </div>
              </li>";
      }
    ?>
  </ul>
</div>
</nav>