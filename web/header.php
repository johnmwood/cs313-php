<?php
    $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>
<nav>
<div class="nav-wrapper teal lighten-2">
    <a href="~/home.php" class="brand-logo">
        <img src="./images/evergreen.png" alt="">CS313 PHP Web App
</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
    <li <?php if ($file === 'about') echo 'class="active"' ?>>
        <a class="nav-item" href="~/about.php">
            About Me
        </a>
    </li>
    <li <?php if ($file === 'home') echo 'class="active"' ?>>
        <a class="nav-item" href="~/home.php">
            Home
        </a>
    </li>
    </ul>
</div>
</nav>