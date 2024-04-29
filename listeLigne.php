<?php

// on demarre une session
session_start();

// on inclut la connexion à la base
require_once('connexion.php');

$sql = "SELECT * FROM `ligne_commande`";

//on prepare la requete
$req=$connexion->prepare($sql);

//var_dump($res  );
//on execute la requete
$req->execute();

//on stocke le resultat dans le tableau associatif
$result = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang= "fr">
    <head>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> ligne commande </title>
        <link rel=" stylesheet" href="style1.css">
        <link rel=" stylesheet" href="moncss.css">
        <link rel=" stylesheet" href="moncss2.css">


</head>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<body style="background-image: url(images/C.jpg)";>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php

                   if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">'. $_SESSION['erreur'].'
                          </div>';
                        $_SESSION['erreur'] = "";

                    }
            
                ?>
                <?php 
                    if (!empty($_SESSION['message'])){

                        echo '<div class="alert alert-success" role="alert">'. $_SESSION['message'].'
                            </div>';
                        $_SESSION['message'] = "";

                    }
                ?>
                <h1> COMMANDES-PRODUITS </h1>
                <table class="table" border="1">
                    <thead>
                    <th>numero de la ligne</th>
                        <th>numero du produit</th>
                        <th>numero de la commande</th>
                        <th>date</th>
                        <th>ACTIONS </th>


                    </thead>  
                    <tbody>
                        <?php
                        //on boucle sur la variable result
                        foreach($result as $ligne_commande):?>
                          
                           <tr>
                           
                               <td><?= $ligne_commande['id_ligne'] ?> </protd>
                               <td><?= $ligne_commande['id_produit'] ?> </td>
                               <td><?= $ligne_commande['id_commande'] ?> </td>
                               <td><?= $ligne_commande['date'] ?> </td>
                               <td><a href="ligne.php?id_ligne=<?=$ligne_commande['id_ligne'] ?>">Ajouter</a>
                               <a href="modifLigne.php?id_ligne=<?=$ligne_commande['id_ligne'] ?>">modifier</a>
                               <a href="delLigne.php?id_ligne=<?=$ligne_commande['id_ligne'] ?>">supprimer</a></td>
                            </tr>
                           <?php endforeach;?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
</html>