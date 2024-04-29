<?php
session_start();

if($_GET){
    if(isset($_GET['id_personnel']) && !empty($_GET['id_personnel'])){
        // On inclut la connexion à la base
        require_once('connexion.php');

      $id_personnel=$_GET['id_personnel'];

        $sql = 'DELETE FROM`client` WHERE id_personnel=:id_personnel ';

        $query = $connexion->prepare($sql);

        $query->bindValue(':id_personnel', $id_personnel, PDO::PARAM_INT);
        
        $query->execute();

        $_SESSION['message'] = "SUPPRESSION REUSSIE !!!";
        header('Location: listeProduit.php');

    }
}
