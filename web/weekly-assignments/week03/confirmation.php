<?php 
    session_start(); 

    // $values = extract($_SESSION["post"]);
    $animals = $_SESSION["animals"];
    $first = htmlspecialchars($_POST["first"]); 
    $last = htmlspecialchars($_POST["last"]); 
    $address = htmlspecialchars($_POST["address"]);
    $zip = htmlspecialchars($_POST["zip"]); 
    $state = htmlspecialchars($_POST["state"]); 
?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="../../src/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation</title>
</head>
<body>
    <div className="container">
        <?php
            require '../../header.php'; 
        ?>
        <h3><?php echo "$first $last"; ?>'s Cart:</h3>
        <?php
        echo '<ul>'; 
        foreach($animals as $animal) {
            $cleanAnimal = htmlspecialchars($animal);
            echo "<li><h5>$cleanAnimal</h5></li>"; 
        }
        echo '</ul></br>'; 

        echo "Address: $address</br>"; 
        echo "Zip: $zip</br>"; 
        echo "State: $state</br>"; 
        ?>
    </div>
</body>
</html>