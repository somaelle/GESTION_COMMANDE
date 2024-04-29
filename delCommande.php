<?php
session_start();

if($_GET){
    if(isset($_GET['id_commande']) && !empty($_GET['id_commande'])){
        // On inclut la connexion à la base
        require_once('connexion.php');

      $id_commande=$_GET['id_commande'];

        $sql = 'DELETE FROM`client` WHERE id_commande=:id_commande ';

        $query = $connexion->prepare($sql);

        $query->bindValue(':id_commande', $id_commande, PDO::PARAM_INT);
        
        $query->execute();

        $_SESSION['message'] = "SUPPRESSION REUSSIE !!!";
        header('Location: listeCommande.php');

    }
}
