<?php 
    $animals = $_POST["animals"]; 
?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="../../src/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div className="container">
        <?php
            require '../../header.php'; 
        ?>
        <h3>Your Cart:</h3>
        <?php
        echo '<ul>'; 
        foreach($animals as $animal) {
            echo "<li>$animal</li>"; 
        }
        echo '</ul>'; 
        ?>
        <button class="btn waves-effect waves-light" type="submit" name="action">Confirm Purchase
            <i class="material-icons right">send</i>
        </button>
    </div>
</body>
</html>