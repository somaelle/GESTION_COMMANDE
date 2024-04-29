<?php
include 'connexion.php';
if (
    !empty($_POST['num_fournisseur'])
    && !empty($_POST['id_personnel'])
    && !empty($_POST['nom_fournisseur'])
    && !empty($_POST['adr_fournisseur'])
) {

$sql = "INSERT INTO fournisseur(num_fournisseur, id_personnel, nom_fournisseur, adr_fournisseur)
        VALUES(?, ?, ?, ?)";
    $req = $connexion->prepare($sql);
    
    $req->execute(array(
        $_POST['num_fournisseur'],
        $_POST['id_personnel'],
        $_POST['nom_fournisseur'],
        $_POST['adr_fournisseur'],
    ));
    
    if ( $req->rowCount()!=0) {
        $_SESSION['message']['text'] = "fournisseur ajouté avec succès";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout du fournisseur";
        $_SESSION['message']['type'] = "danger";
    }

} else {
    $_SESSION['message']['text'] ="Une information obligatoire non rensignée";
    $_SESSION['message']['type'] = "danger";
}

header('Location:fournisseur.php');