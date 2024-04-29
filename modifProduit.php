<?php
include 'connexion.php';
if (
    !empty($_POST['id_produit'])
    && !empty($_POST['num_fournisseur'])
    && !empty($_POST['nom_produit'])
    && !empty($_POST['cathegorie'])
    && !empty($_POST['pu'])
    && !empty($_POST['id_produit'])
) {

$sql = "UPDATE produit SET id_produit=?, num_fournisseur=?, nom_produit=?, cathegorie=?, pu=? WHERE id_produit=?";
    $req = $connexion->prepare($sql);
    
    $req->execute(array(
        $_POST['id_produit'],
        $_POST['num_fournisseur'],
        $_POST['nom_produit'],
        $_POST['cathegorie'],
        $_POST['pu'],
        $_POST['id_produit'],
    ));
    
    if ( $req->rowCount()!=0) {
        $_SESSION['message']['text'] = "produit modifié avec succès";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "Rien a été modifié";
        $_SESSION['message']['type'] = "warning";
    }

} else {
    $_SESSION['message']['text'] = "Une information obligatoire non rensignée";
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
            <form action="" method="post" enctype="multipart/form-data">
                <label for="id_produit">Numero du produit <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $produit['id_produit'] : "" ?>" type="text" name="id_produit" id="id_produit" placeholder="Veuillez saisir le numero">
                <input value="<?= !empty($_GET['id']) ?  $produit['id'] : "" ?>" type="hidden" name="id" id="id">
                <label for="num_fournisseur">Numero du fournisseur <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['num_fournisseur'] : "" ?>" type="text" name="num_fournisseur" id="num_fournisseur" placeholder="Veuillez saisir le numero">
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['id'] : "" ?>" type="hidden" name="id" id="id">
                 <label for="nom_produit">Nom du produit <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $produit['nom_produit'] : "" ?>" type="text" name="nom_produit" id="nom_produit" placeholder="Veuillez saisir le nom">
                <input value="<?= !empty($_GET['id']) ?  $produit['id'] : "" ?>" type="hidden" name="id" id="id">
                <label for="cathegorie">cathegorie du produit <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $produit['cathegorie'] : "" ?>" type="text" name="cathegorie" id="cathegorie" placeholder="Veuillez saisir la cathegorie">
                <input value="<?= !empty($_GET['id']) ?  $produit['id'] : "" ?>" type="hidden" name="id" id="id">

                <label for="pu">Prix unitaire <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $produit['pu'] : "" ?>" type="number" name="pu" id="pu" placeholder="Veuillez saisir le prix">

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
</section>


