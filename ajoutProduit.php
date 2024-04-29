<?php
include 'connexion.php';
if (
    !empty($_POST['id_produit'])
    && !empty($_POST['num_fournisseur'])
    && !empty($_POST['nom_produit'])
    && !empty($_POST['cathegorie'])
    && !empty($_POST['pu'])
    
) {

$sql = "INSERT INTO $nom_base_de_donne.article(id_produit, num_fournisseur, nom_produit, cathegorie, pu)
        VALUES(?, ?, ?, ?, ?)";
     $req = $connexion->prepare($sql);
    
     $req->execute(array(
            $_POST['id_produit'],  
            $_POST['num_fournisseur'],
            $_POST['nom_produit'],
            $_POST['cathegorie'],
            $_POST['pu'],
    
        ));
    
        if ( $req->rowCount()!=0) {
            $_SESSION['message']['text'] = "article ajouté avec succès";
            $_SESSION['message']['type'] = "success";
        }else {
            $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout de l'article";
            $_SESSION['message']['type'] = "danger";
        }
    }else {
        $_SESSION['message']['text'] = "Une information obligatoire non rensignée";
        $_SESSION['message']['type'] = "danger";
    }
    
    

header('Location:produit.php');