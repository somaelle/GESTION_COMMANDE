<?php

// on demarre une session
session_start();

// on inclut la connexion à la base
require_once('connexion.php');

$sql = "SELECT * FROM `commande`";

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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <link rel=" stylesheet" href="style1.css">
        <link rel=" stylesheet" href="moncss.css">
        <link rel=" stylesheet" href="moncss2.css">

    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> liste des commandes </title>
        
</head>
  
<body style="background-color:gray";>
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
                <h1> LISTE DES COMMANDES </h1>
                <table class="table" border="1">
                    <thead>
                    <th>numero du commande</th>
                        <th>numero du client</th>
                        <th>numero du personnel</th>
                        <th>nombre de commande </th>
                        <th>date commande</th>
                        <th>ACTIONS</th>
                    </thead>  
                    <tbody>
                        <?php
                        //on boucle sur la variable result
                        foreach($result as $commande):?>
                          
                           <tr>
                           
                               <td><?= $commande['id_commande'] ?> </protd>
                               <td><?= $commande['num_client'] ?> </td>
                               <td><?= $commande['id_personnel'] ?> </td>
                               <td><?= $commande['nrbre_commande'] ?> </td>
                               <td><?= $commande['date_commande'] ?> </td>
                               <td><a href="commande.php?id_commande=<?=$commande['id_commande'] ?>">Ajouter</a>
                               <a href="modifCommande.php?id_commande=<?=$commande['id_commande'] ?>">modifier</a>
                               <a href="delCommande.php?id_commande=<?=$commande['id_commande'] ?>">supprimer</a></td>
                            </tr>
                           <?php endforeach;?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
</html>