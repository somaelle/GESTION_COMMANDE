<?php

// on demarre une session
session_start();

// on inclut la connexion à la base
require_once('connexion.php');

$sql = "SELECT * FROM `personnel`";

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
<link rel=" stylesheet" href="moncss.css">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
        <link rel=" stylesheet" href="style1.css">
        <link rel=" stylesheet" href="moncss.css">
        <link rel=" stylesheet" href="moncss2.css">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> liste du personnel </title>
        <link rel=" stylesheet" href="style1.css">

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
                <h1> LISTE DES PERSONNEL </h1>
                <table class="table" border="1">
                    <thead>
                    <th>numero du personnel</th>
                        <th>nom du personnel</th>
                        <th>role du personnel</th>
                        <th>mot de passe </th>
                        <th>ACTIONS </th>


                    </thead>  
                    <tbody>
                        <?php
                        //on boucle sur la variable result
                        foreach($result as $personnel):?>
                          
                           <tr>
                           
                               <td><?= $personnel['id_personnel'] ?> </protd>
                               <td><?= $personnel['nom_personnel'] ?> </td>
                               <td><?= $personnel['role_personnel'] ?> </td>
                               <td><?= $personnel['mot_de_passe'] ?> </td>
                               <td><a href="personnel.php?id_personnel=<?=$personnel['id_personnel'] ?>">Ajouter</a>
                               <a href="modifPersonnel.php?id_personnel=<?=$personnel['id_personnel'] ?>">modifier</a>
                               <a href="delPersonnel.php?id_personnel=<?=$personnel['id_personnel'] ?>">supprimer</a></td>
                            </tr>
                           <?php endforeach;?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
</html>