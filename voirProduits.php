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
    }
    $recup = $connection->query('SELECT images, descriptions, prix FROM produit ORDER BY id');
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="offset-3 col-4 choix">
                <a href="index.php?uc=boite"><button type="button" class="btn btn-success">Boites</button></a>
                <a href="index.php?uc=fiole"><button type="button" class="btn btn-success">Fioles</button></a>
                <a href="index.php?uc=bracelet"><button type="button" class="btn btn-success">Bracelets</button></a>
            </div>
        </div>



        <div class="col-12">
            <div class="row">
                <?php
                while ($donnees = $recup->fetch()) { ?>
                    <div class="col-4">
                        <form action="index.php?uc=gererPanier" method="post">
                        <br><label for="image"><img id="img1" src="<?= $donnees['images'] ?>" alt="affiche image"></label><br>
                        <?php echo '<label for="description">' . $donnees['descriptions'] . '</label><br>';
                        echo '<label for="description">' . $donnees['prix'] . ' €</label><br> ';?>
                        <button style='font-size:24px'><i class='fas fa-cart-arrow-down'></i></button><hr><br><br>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    

   



    <?php

    // $action = $_REQUEST['action'];
    // switch($action){
    //     case 'voirCategories':
    //         $lesCategories = $pdo->getLesCategories();
    //         include('vues/categories.php');
    //     break;
    //     case 'voirProduits':
    //         $lesCategories = $pdo->getLesCategories();
    //         include('vues/categories.php');
    //         $categorie = $_REQUEST['categorie'];
    //         $lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
    //         include('vues/produits.php');
    //     break;
    //     case 'ajouterAuPanier' :
    //         $idProduit = $_REQUEST['produit'];
    //         $categorie = $_REQUEST['categorie'];
    //         $ok = ajouterAuPanier($idProduit);
    //         if(!$ok){
    //             $message = 'Cet article est déjà dans le panier !';
    //             include('vues/message.php');
    //         }
    //         $lesCategories = $pdo->getLesCategories();
    //         include('vues/categories.php');
    //         $lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
    //         include('vues/produits.php');
    // }

   ?>

    