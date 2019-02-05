<?php
  $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
  $root = $_SERVER["DOCUMENT_ROOT"]; 

  $user = 'test_user'; # TODO: read value from database 
  $user_credits = 5; # TODO: read value from database 
?>
<nav>
<div class="nav-wrapper teal lighten-2">
  <a href="home.php" class="brand-logo">
    <img src="<?php echo $root . '/images/evergreen.png'; ?>" alt="">CS313 PHP Web App
  </a>
  <ul id="nav-mobile" class="right hide-on-med-and-down">
    <button className="btn-flat right blue">
      Credits: <?php echo $user_credits ?>
      <i className="material-icons">attach_money</i>
    </button>
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