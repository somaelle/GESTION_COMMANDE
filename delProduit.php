<?php
session_start();

if($_GET){
    if(isset($_GET['id_produit']) && !empty($_GET['id_produit'])){
        // On inclut la connexion à la base
        require_once('connexion.php');

      $id_produit=$_GET['id_produit'];

        $sql = 'DELETE FROM`client` WHERE id_produit=:id_produit ';

        $query = $connexion->prepare($sql);

        $query->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
        
        $query->execute();

        $_SESSION['message'] = "SUPPRESSION REUSSIE !!!";
        header('Location: listeCommande.php');

    }
}
