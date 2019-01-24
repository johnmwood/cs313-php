<?php
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>
<nav>
<div class="nav-wrapper">
    <a href="#" class="brand-logo">Logo</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
    <li>
        <a class="nav-item 
            <?php if ($file === 'about') echo 'active' ?>" 
            href="about.php">
            About Me
        </a>
    </li>
    <li>
        <a class="nav-item
            <?php if ($file === 'home') echo 'active' ?>" 
            href="home.php">
            Home
        </a>
    </li>
    </ul>
</div>
</nav>