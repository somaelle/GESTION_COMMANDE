<?php

// on demarre une session
session_start();

// on inclut la connexion à la base
require_once('connexion.php');

$sql = "SELECT * FROM `client`";

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
        <title> liste des clients </title>
        <link rel=" stylesheet" href="form.css">
</head>
    <link rel=" stylesheet" href="form.css">
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
                <h1> LISTE DES CLIENTS </h1>
                <table class="table" border="1">
                    <thead>
                    <th>numero du client</th>
                        <th>nom du client</th>
                        <th>adresse du client </th>
                        <th>ACTIONS </th>

                    </thead>  
                    <tbody>
                        <?php
                        //on boucle sur la variable result
                        foreach($result as $client):?>
                          
                           <tr>
                           
                               <td><?= $client['num_client'] ?> </protd>
                               <td><?= $client['nom_client'] ?> </td>
                               <td><?= $client['adr_client'] ?> </td>
                               <td><a href="client.php?num_client=<?=$client['num_client'] ?>">Ajouter</a>
                               <a href="modifClient.php?num_client=<?=$client['num_client'] ?>">modifier</a>
                               <a href="delClient.php?num_client=<?=$client['num_client'] ?>">supprimer</a></td>
                            </tr>
                           <?php endforeach;?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
</html>