<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="form.css">
<link rel=" stylesheet" href="moncss.css">
<head>
    <meta charset="utf-8">
<title>Essai sur mon projet </title>
</head>
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="moncss2.css">
<body style="background-image: url(images/A.jpg)";>
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
        
        
            <h1>PASSER UNE COMMANDE</h1>
            <div class="input-box">
            <label  name="nom_produit" >nom du produit</label>
                <input type="text" name="nom_produit" placeholder="Entrer le nom du produit"required>
            </div>
            <a href="#">mot de passe oublié?</a>    <button type="submit" class="btn" name= "btn">SOUMETTRE</button>
              </form>
              <?php
     require_once "connexion.php";          
     if(isset($_POST['btn'])){
        $nom_produit = $_POST['nom_produit'];
        try {
           $sql="SELECT nom_produit FROM produit WHERE nom_produit ='$nom_produit'";
           $resultat = $connexion->query($sql);
         } catch (PDOExeption $e) {
             echo $e->getMessage();
         }
         $nom_produit=$resultat->fetch();
         if( $nom_produit){
            echo" commande passée avec succès";}
            else {
           echo"<p style='color red;text align:center;'> produit en rupture !!!</p>";
        }
     }
        ?>
     
       
    </div>
</body>
</html>