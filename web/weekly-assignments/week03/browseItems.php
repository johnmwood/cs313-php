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
        <form method="POST" action="viewCart.php">
            <p>What would you like to buy?</p>
            <p>
                <label>
                <input type="checkbox" class="filled-in" name="animal" value="Cat" />
                <span>Cat</span>
                </label>
            </p>
            <p>
                <label>
                <input type="checkbox" class="filled-in" name="animal" value="Dog"  />
                <span>Dog</span>
                </label>
            </p>
            <p>
                <label>
                <input type="checkbox" class="filled-in" name="animal" value="Goat" />
                <span>Goat</span>
                </label>
            </p>
            <p>
                <label>
                <input type="checkbox" class="filled-in" name="animal" value="Frog" />
                <span>Frog</span>
                </label>
            </p>
            <p>
                <label>
                <input type="checkbox" class="filled-in" name="animal" value="Turtle" />
                <span>Turtle</span>
                </label>
            </p>
            <p>
                <label>
                <input type="checkbox" class="filled-in" name="animal" value="Fox" />
                <span>Fox</span>
                </label>
            </p>
            <input type="submit" name="formSubmit" value="Submit" />

            <!-- <button name="fileurlsubmitted"
                    type="submit"  
                    value="ANY_VALUE_HERE" 
                    class="btn waves-effect waves-light" 
                    id="submitFileUrlForDownload">Submit Order
            </button> -->
        </form>
    </div>
</body>
</html>