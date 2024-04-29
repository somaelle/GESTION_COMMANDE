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
        
        
            <h1>AUTHENTIFIZ-VOUS</h1>
            <div class="input-box">
            <label  name="num_client" >numero du client</label>
                <input type="text" name="num_client" placeholder="numero"required>
            </div>
            <div class="input-box">
            <label  name="nom_client" >nom du client</label>
            <input type="text" name="nom_client" placeholder="nom" required>
            </div>
            <a href="#">numero oublié?</a>    <button type="submit" class="btn" name= "btn">SOUMETTRE</button>
              </form>
              <?php
     require_once "connexion.php";          
     if(isset($_POST['btn'])){
        $num_client = $_POST['num_client'];
        $nom_client = $_POST['nom_client'];
        try {
           $sql="SELECT num_client, nom_client FROM client WHERE num_client ='$num_client' AND nom_client ='$nom_client'";
           $resultat = $connexion->query($sql);
         } catch (PDOExeption $e) {
             echo $e->getMessage();
         }
         $num_client=$resultat->fetch();
         if( $num_client){
           header('location:PC.php');
         }
         else {
           echo"<p style='color red;text align:center;'> cordonnees incorrectes!!!</p>";
        }
     }
     ?>
     
       
    </div>
</body>
</html>