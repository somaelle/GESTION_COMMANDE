<?php
include 'connexion.php';
if (
    !empty($_POST['num_fournisseur'])
    && !empty($_POST['id_personnel'])
    && !empty($_POST['nom_fournisseur'])
    && !empty($_POST['adr_fournisseur'])
) {

$sql = "INSERT INTO fournisseur(num_fournisseur, id_personnel, nom_fournisseur, adr_fournisseur)
        VALUES(?, ?, ?, ?)";
    $req = $connexion->prepare($sql);
    
    $req->execute(array(
        $_POST['num_fournisseur'],
        $_POST['id_personnel'],
        $_POST['nom_fournisseur'],
        $_POST['adr_fournisseur'],
    ));
    
    if ( $req->rowCount()!=0) {
        $_SESSION['message']['text'] = "fournisseur ajouté avec succès";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout du fournisseur";
        $_SESSION['message']['type'] = "danger";
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
 <link rel="stylesheet" href="style1.css">

<body  style="background-image: url(images/B.jpg)";>>
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

<?php
?>