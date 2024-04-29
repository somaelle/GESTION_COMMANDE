<?php

// on demarre une session
session_start();

// on inclut la connexion à la base
require_once('connexion.php');

$sql = "SELECT * FROM `fournisseur`";

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
<link rel=" stylesheet" href="style1.css">
<link rel=" stylesheet" href="moncss.css">

    <head>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> liste des fournisseurs </title>
        <link rel=" stylesheet" href="style1.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <link rel=" stylesheet" href="style1.css">
        <link rel=" stylesheet" href="moncss.css">
        <link rel=" stylesheet" href="moncss2.css">

</head>

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
                <h1> LISTE DES FOURNISSEURS </h1>
                <table class="table" border ="1">
                    <thead>
                        <th>numero du fournisseur</th>
                        <th>numero du personnel</th>
                        <th>nom du fournisseur</th>
                        <th>adresse du fournisseur </th>
                        <th>ACTIONS </th>


                    </thead>  
                    <tbody>
                        <?php
                        //on boucle sur la variable result
                        foreach($result as $fournisseur):?>
                          
                           <tr>
                           
                               <td><?= $fournisseur['num_fournisseur'] ?> </protd>
                               <td><?= $fournisseur['id_personnel'] ?> </td>
                               <td><?= $fournisseur['nom_fournisseur'] ?> </td>
                               <td><?= $fournisseur['adr_fournisseur'] ?> </td>
                               <td><a href="fournisseur.php?num_fournisseur=<?=$fournisseur['num_fournisseur'] ?>">Ajouter</a>
                               <a href="modifFournisseur.php?num_fournisseur=<?=$fournisseur['num_fournisseur'] ?>">modifier</a>
                               <a href="delFournisseur.php?num_fournisseur=<?=$fournisseur['num_fournisseur'] ?>">supprimer</a></td>
                            </tr>
                           <?php endforeach;?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
</html>