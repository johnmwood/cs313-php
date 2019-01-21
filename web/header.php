<?php
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>
<nav class="main-nav">
    <div class="logo">
        <a href="home.php"><img src="/images/evergreen.png" alt="logo"></a> 
        <a class="logo-title" href="home.php">CS313 Web App</a>
    </div>
    <a class="nav-item <?php if ($file === 'about') echo 'active' ?>" href="about.php" >About Me</a>
    <a class="nav-item <?php if ($file === 'home') echo 'active' ?>" href="home.php">Home</a>
</nav> 
