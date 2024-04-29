<?php
session_start();

if($_GET){
    if(isset($_GET['num_client']) && !empty($_GET['num_client'])){
        // On inclut la connexion à la base
        require_once('connexion.php');

      $num_client=$_GET['num_client'];

        $sql = 'DELETE FROM`client` WHERE num_client=:num_client ';

        $query = $connexion->prepare($sql);

        $query->bindValue(':num_client', $num_client, PDO::PARAM_INT);
        
        $query->execute();

        $_SESSION['message'] = "SUPPRESSION REUSSIE !!!";
        header('Location: listeClient.php');

    }
}
