<body>
    <?php

    $server = 'localhost';
    $login = 'root';
    $pass = '';

    try {
        $connection = new PDO("mysql:host=$server;dbname=present", $login, $pass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    } ?>


<div class="row">
            <div class="offset-3 col-4 choix">
                <a href="index.php?uc=boite"><button type="button" class="btn btn-success">Boites</button></a>
                <a href="index.php?uc=fiole"><button type="button" class="btn btn-success">Fioles</button></a>
                <a href="index.php?uc=bracelet"><button type="button" class="btn btn-success">Bracelets</button></a>
            </div>
        </div>
        <h1>Les bracelets</h1>
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <?php $lesCategories = $connection->query("SELECT images, descriptions, prix FROM produit WHERE idCategorie = 'bra'");
                    while ($test = $lesCategories->fetch()) { ?>
                        <div class="col-4">
                            <br><img id="img1" src="<?= $test['images'] ?>" alt="affiche image"><br>
                            <?php
                            echo $test['descriptions'] . '<br>';
                            echo $test['prix'] . ' € <hr><br><br>';?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>



</body>