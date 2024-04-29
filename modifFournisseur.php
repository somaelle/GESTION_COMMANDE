<?php
include 'connexion.php';
if (
    !empty($_POST['num_fournisseur'])
    && !empty($_POST['id_personnel'])
    && !empty($_POST['nom_fournisseur'])
    && !empty($_POST['adr_fournisseur'])
    && !empty($_POST['num_fournisseur'])
) {

$sql = "UPDATE fournisseur SET num_fournisseur=?, id_personnel=?, nom_fournisseur=?, adr_fournisseur=? WHERE num_fournisseur=?";
    $req = $connexion->prepare($sql);
    
    $req->execute(array(
        $_POST['num_fournisseur'],
        $_POST['id_personnel'],
        $_POST['nom_fournisseur'],
        $_POST['adr_fournisseur'],
        $_POST['num_fournisseur'],
    ));
    
    if ( $req->rowCount()!=0) {
        $_SESSION['message']['text'] = "fournisseur modifié avec succès";
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
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <link rel=" stylesheet" href="style1.css">
        <link rel=" stylesheet" href="moncss.css">
        <link rel=" stylesheet" href="moncss2.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <link rel="stylesheet" href="style1.css">

<body>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="" method="post"enctype="multipart/form.data">
                <label for="num_fournisseur">Numero du fournisseur <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['num_fournisseur'] : "" ?>" type="number" name="num_fournisseur" id="num_fournisseur" placeholder="Veuillez saisir le num_fournisseur">
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['id'] : "" ?>" type="hidden" name="id" id="id" >
                
                <label for="id_personnel">numero_personnel <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['id_personnel'] : "" ?>" type="number" name="id_personnel" id="id_personnel" placeholder="Veuillez saisir le numero du personnel">

                <label for="nom_fournisseur">nom_fournisseur <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['nom_fournisseur'] : "" ?>" type="text" name="nom_fournisseur" id="nom_fournisseur" placeholder="Veuillez saisir le nom">
                
                <label for="adr_fournisseur">adr_fournisseur <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['adr_fournisseur'] : "" ?>" type="text" name="adr_fournisseur" id="adr_fournisseur" placeholder="Veuillez saisir l'adr_fournisseur">

                <button type="submit">Valider</button>

                <?php
                if (!empty($_SESSION['message']['text'])) {
                ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php
                }
                ?>
            </form>

        </div>
       
    </div>
</div>
</section>