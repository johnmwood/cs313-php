<?php
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>
<nav class="main-nav">
    <a class="logo" href="home.php"><img src="/images/evergreen.png" alt="logo">
    <h3>CS313 Web App</h3>
    <div>
        <a class="nav-item <?php if ($file === 'about') echo 'active' ?>" href="about.php" >About Me</a>
        <a class="nav-item <?php if ($file === 'home') echo 'active' ?>" href="home.php">Home</a>
    </div>
</nav> 
