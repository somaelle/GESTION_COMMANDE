<?php
require_once 'connexion.php';
if (
    !empty($_POST['num_client'])
    && !empty($_POST['nom_client'])
    && !empty($_POST['adr_client'])
) {

$sql = "INSERT INTO secel_gestion1.client(num_client, nom_client, adr_client)
        VALUES(?, ?, ?,)";
    $req = $connexion->prepare($sql);
    
    $req->execute(array(
        $_POST['num_client'],
        $_POST['nom_client'],
        $_POST['adr_client'],
    ));
    
    if ( $req->rowCount()!=0) {
        $_SESSION['message']['text'] = "client ajouté avec succès";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout du client";
        $_SESSION['message']['type'] = "danger";
    }

} else {
    $_SESSION['message']['text'] ="Une information obligatoire non rensignée";
    $_SESSION['message']['type'] = "danger";
}
?>
