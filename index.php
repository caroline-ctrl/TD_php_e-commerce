<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>

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

    include('vues/entete.php');
    include('vues/bandeau.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div id="nav">
                    <a href="index.php?uc=accueil"><button type="button" class="btn btn-info">Accueil</button></a>
                    <a href="index.php?uc=voirProduits"><button type="button" class="btn btn-info">Catalogue</button></a>
                    <a href="index.php?uc=gererPanier"><button type="button" class="btn btn-info">Panier</button></a>
                    <a href="index.php?uc=administrer"><button type="button" class="btn btn-info">Administrer</button></a>
                </div>
            </div>

            <div class="col-10">
            <?php
            if (!isset($_REQUEST['uc'])) {
                $uc = 'accueil';
            } else {
                $uc = $_REQUEST['uc'];
            }

            switch ($uc) {
                case 'accueil':
                    include('vues/accueil.php');
                    break;
                case 'voirProduits':
                    include('voirProduits.php');
                    break;
                case 'gererPanier':
                    include('gestionPanier.php');
                    break;
                case 'administrer':
                    include('gestionProduits.php');
                break;
                case 'boite':
                    include('categories/boite.php');
                break;
                case 'fiole':
                    include('categories/fiole.php');
                break;
                case 'bracelet':
                    include('categories/bracelet.php');
                break;
                    default:
                    include('erreur.php');
            }

            ?>
            </div>
        </div>
    </div>

    <?php include('vues/pied.php') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>