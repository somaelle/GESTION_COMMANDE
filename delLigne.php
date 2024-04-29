<?php
session_start();

if($_GET){
    if(isset($_GET['id_ligne']) && !empty($_GET['id_ligne'])){
        // On inclut la connexion à la base
        require_once('connexion.php');

      $id_ligne=$_GET['id_ligne'];

        $sql = 'DELETE FROM`client` WHERE id_ligne=:id_ligne ';

        $query = $connexion->prepare($sql);

        $query->bindValue(':id_ligne', $id_ligne, PDO::PARAM_INT);
        
        $query->execute();

        $_SESSION['message'] = "SUPPRESSION REUSSIE!!!";
        header('Location: listeLigne.php');

    }
}
