<?php
  require("../db/db_connect.php");

  $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
  $root = $_SERVER["DOCUMENT_ROOT"]; 

  $username = 'test'; # TODO: set up query for username with login
  $query = $db->prepare("SELECT credits
                         FROM users
                         WHERE username = :username"); 
  $query->bindValue(':username', $username, PDO::PARAM_STR); 
  $query->execute(); 

  $user_credits = $query->fetch(PDO::FETCH_ASSOC);
?>
<nav>
<div class="nav-wrapper teal lighten-2">
  <a href="home.php" class="brand-logo">
    <img src="<?php echo $root . '/images/evergreen.png'; ?>" alt="">CS313 PHP Web App
  </a>
  <ul id="nav-mobile" class="right">
    <li className="btn-flat blue">
      User Credits: <?php echo $user_credits ?>
      <i class="small material-icons">attach_money</i>
    </li>
    <li <?php if ($file === 'about') echo 'class="active"' ?>>
      <a class="nav-item" href="<?php echo $root . '/about.php'; ?>">
        About Me
      </a>
    </li>
    <li <?php if ($file === 'home') echo 'class="active"' ?>>
      <a class="nav-item" href="<?php echo $root . '/home.php'; ?>">
        Home
      </a>
    </li>
  </ul>
</div>
</nav>