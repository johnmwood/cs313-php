<?php
  require("../db/db_connect.php");

  $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
  $root = $_SERVER["DOCUMENT_ROOT"]; 

  // $user_credits = $db->query("SELECT username 
  //                             FROM users 
  //                             WHERE username = $dbUser"); 
?>
<nav>
<div class="nav-wrapper teal lighten-2">
  <a href="home.php" class="brand-logo">
    <img src="<?php echo $root . '/images/evergreen.png'; ?>" alt="">CS313 PHP Web App
  </a>
  <ul id="nav-mobile" class="right">
    <li className="btn-flat blue">
      <i class="small material-icons">attach_money</i>
      User Credits: <?php echo $user_credits ?>
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