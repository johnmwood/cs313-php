<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="../../src/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Cart</title>
</head>
<body>
    <div className="container">
        <?php
            require '../../header.php'; 
        ?>
        <div class="row">
            <form class="" method="POST" action="confirmation.php">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate" name="first">
                        <label class="active" for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="last">
                        <label class="active" for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="address" type="text" class="validate" name="address">
                        <label class="active" for="address">Address</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="zip" type="text" class="validate" name="zip">
                        <label class="active" for="zip">Zip Code</label>
                    </div> 
                    <div class="input-field col s6">
                        <input id="state" type="text" class="validate" name="state">
                        <label class="active" for="state">State</label>
                    </div> 
                </div>
                <input type="text" name="animals" value="<?php echo isset($_POST["animals"]) ? $_POST["animals"] : '' ?>" />

                <button class="btn waves-effect waves-light" type="submit" name="action">Confirm Purchase</button>
            </form>  
        </div>
    </div>
</body>
</html>