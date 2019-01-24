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
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Autocomplete</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>