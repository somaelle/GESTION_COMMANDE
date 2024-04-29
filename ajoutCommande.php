<?php
include 'connexion.php';
if (
    !empty($_POST['id_commande'])
    && !empty($_POST['num_client'])
    && !empty($_POST['id_personnel'])
    && !empty($_POST['nrbre_commande'])
    && !empty($_POST['date_commande'])
) {

    $sql = "INSERT INTO secel_gestion1.commande(id_commande, num_client, id_personnel, nrbre_commande,date_command)
            VALUES(?, ?, ?, ?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['id_commande'],
        $_POST['num_client'],
        $_POST['id_personnel'],
        $_POST['nrbre_commande'],
        $_POST['date_commande'],
        ) );

        if ($req->rowCount() != 0) {
            $_SESSION['message']['text'] = "commande effectué avec succès";
            $_SESSION['message']['type'] = "success";
        } else {
            $_SESSION['message']['text'] = "Impossible de faire cette commande";
            $_SESSION['message']['type'] = "danger";
        }        
}   
 else {
    $_SESSION['message']['text'] = "Une information obligatoire non rensignée";
    $_SESSION['message']['type'] = "danger";
}

header('Location:commande.php');
