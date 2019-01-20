<?php
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>
<nav class="main-nav">
    <div class="logo"><a href="home.php"><img src="/images/evergreen.png" alt="logo"></a></div>
    <h3>CS313 Web App</h3>
    <div>
        <a class="nav-item <?php if ($file === 'about') echo 'active' ?>" href="about.php" >About Me</a>
        <a class="nav-item <?php if ($file === 'home') echo 'active' ?>" href="home.php">Home</a>
    </div>
</nav> 
