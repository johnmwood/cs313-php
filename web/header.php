<?php
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>
<nav class="main-nav">
    <div><img src="/images/evergreen.png" alt="logo"></div>
    <h3>CS313 Web App</h3>
    <ul>
        <li class="nav-item <?php if ($file === 'about') echo 'active' ?>">
            <a href="about.php" >About Me</a>
        </li>
        <li class="nav-item <?php if ($file === 'home') echo 'active' ?>">
            <a href="home.php">Home</a>
        </li>
    </ul>
</nav> 
