<?php
session_start();

if($_GET){
    if(isset($_GET['num_fournisseur']) && !empty($_GET['num_fournisseur'])){
        // On inclut la connexion à la base
        require_once('connexion.php');

      $num_fournisseur=$_GET['num_fournisseur'];

        $sql = 'DELETE FROM`client` WHERE num_fournisseur=:num_fournisseur ';

        $query = $connexion->prepare($sql);

        $query->bindValue(':num_fournisseur', $num_fournisseur, PDO::PARAM_INT);
        
        $query->execute();

        $_SESSION['message'] = "SUPPRESSION REUSSI!!!";
        header('Location: listeFournisseur.php');

    }
}
