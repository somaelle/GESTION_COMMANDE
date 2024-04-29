<?php
include 'connexion.php';
if (
    !empty($_POST['id_personnel'])
    && !empty($_POST['nom_personnel'])
    && !empty($_POST['role_personnel'])
    && !empty($_POST['mot_de_passe'])
    && !empty($_POST['id_personnel'])
) {

$sql = "UPDATE personnel SET id_personnel=?, nom_personnel=?, role_personnel=?, mot_de_passe=? WHERE id_personnel=?";
    $req = $connexion->prepare($sql);
    
    $req->execute(array(
        $_POST['id_personnel'],
        $_POST['nom_personnel'],
        $_POST['role_personnel'],
        $_POST['mot_de_passe'],
        $_POST['id_personnel'],
    ));
    
    if ( $req->rowCount()!=0) {
        $_SESSION['message']['text'] = "personnel modifié avec succès";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "Rien a été modifié";
        $_SESSION['message']['type'] = "warning";
    }

} else {
    $_SESSION['message']['text'] ="Une information obligatoire non rensignée";
    $_SESSION['message']['type'] = "danger";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <link rel=" stylesheet" href="style1.css">
        <link rel=" stylesheet" href="moncss.css">
        <link rel=" stylesheet" href="moncss2.css">

<body>
    
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="" method="post"enctype="multipart/form.data">

                <label for="id_personnel">numero <span class="text-danger">*</span></label>
                <input type="number" name="id_personnel" id="id_personnel" placeholder="veuillez saisir le numero du personnel"required>

                <label for="nom_personnel">nom <span class="text-danger">*</span></label>
                <input type="text" name="nom_personnel" id="nom_personnel" placeholder="veuillez saisir le nom_personnel"required>

                <label for="role_personnel">role <span class="text-danger">*</span></label>
                <input type="text" name="role_personnel" id="role_personnel" placeholder="veuillez saisir le role_personnel"required>

                <label for="mot_de_passe">mot_de_passe <span class="text-danger">*</span></label>
                <input type="text" name="mot_de_passe" id="mot_de_passe" placeholder="veuillez saisir le mot_de_passe"required>

                <button type="submit"> Valider </button>

                <?php
                if (!empty($_SESSION['message']['text'])){
                ?>
                    <div class="alert <?=$_SESSION['message']['type'] ?>">
                        <?=$_SESSION['message']['text'] ?>
                    </div>
                <?php
                }
                ?>
                
            </form>    
        </div>
    </div>
</div>