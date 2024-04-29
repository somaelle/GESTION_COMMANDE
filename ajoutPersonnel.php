<?php
include "connexion.php"; 
//    echo $_POST['prenom'];
//    echo $_POST['contact'];
//    echo $_POST['adresse'];
if (
    
     (isset($_POST['nom_ingenieur']))
    and (isset($_POST['prenom']))
    and (isset($_POST['contact']))
    and (isset($_POST['adresse']))
){

$sql = "INSERT INTO ingenieur( nom_ingenieur, prenom, contact, adresse)
        VALUES( 
        '$nom_ingenieur',
        '$prenom',
        '$contact',
        '$adresse')";
    $req= $connexion->exec($sql);
    if ($req){
        $_SESSION['message']['text']="ingenieur ajouter avec succès"; 
       //echo"ingenieur ajouter avec succès";
        $_SESSION['message']['type']= "success";
    }else {
        $_SESSION['message']['text']= "une erreur c'est produite lors de l'ajout du ingenieur";
      // echo"une erreur c'est produite lors de l'ajout du ingenieur";
        $_SESSION['message']['type']= "danger";
        
        
    }
}else{
     $_SESSION['message']['text']="une information obligatoire absente";
    //echo "une information obligatoire absente";
     $_SESSION['message']['type']= "danger";
        

}   
//header('location:personnel.php');

header('location:personnel.php');