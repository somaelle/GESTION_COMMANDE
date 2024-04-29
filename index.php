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
        
        
            <h1>AUTHENTIFICATION</h1>
            <div class="input-box">
            <label  name="user" >user_name</label>
                <input type="text" name="user" placeholder="Entrer votre nom"required>
            </div>
            <div class="input-box">
            <label  name="password" >password</label>
            <input type="text" name="password" placeholder="mot de passe" required>
            </div>
            <a href="#">mot de passe oublié?</a>    <button type="submit" class="btn" name= "btn">SOUMETTRE</button>
              </form>
              <?php
     require_once "connexion.php";          
     if(isset($_POST['btn'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        try {
           $sql="SELECT * FROM admin WHERE user ='$user' AND password ='$password'";
           $resultat = $connexion->query($sql);
         } catch (PDOExeption $e) {
             echo $e->getMessage();
         }

         $user=$resultat->fetch();
         if( $user){
            header('location:side.php');
         }
         else {
           echo"<p style='color red;text align:center;'> cordonnees incorrectes!!!</p>";
        }
    }
     ?>
     
       
    </div>
</body>
</html>