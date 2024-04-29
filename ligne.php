<?php
include 'connexion.php';
if (
    !empty($_POST['id_ligne'])
    && !empty($_POST['id_produit'])
    && !empty($_POST['id_commande'])
    && !empty($_POST['date'])
) {

$sql = "INSERT INTO ligne_commande(id_ligne, id_produit, id_commande, date)
        VALUES(?, ?, ?, ?)";
    $req = $connexion->prepare($sql);
    
    $req->execute(array(
        $_POST['id_ligne'],
        $_POST['id_produit'],
        $_POST['id_commande'],
        $_POST['date'],
    ));
    
    if ( $req->rowCount()!=0) {
        $_SESSION['message']['text'] = "ligne_commande ajouté avec succès";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout de la ligne_commande";
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
 <link rel="stylesheet" href="moncss2.css">

<body style="background-image: url(images/B.jpg)";>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="" method="post"enctype="multipart/form.data">
                <label for="id_ligne">Numero de la ligne <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $ligne_commande['id_ligne'] : "" ?>" type="number" name="id_ligne" id="id_ligne" placeholder="Veuillez saisir le id_ligne"required>
                <input value="<?= !empty($_GET['id']) ?  $ligne_commande['id'] : "" ?>" type="hidden" name="id" id="id" >
                
                <label for="id_produit">numero_produit <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $ligne_commande['id_produit'] : "" ?>" type="number" name="id_produit" id="id_produit" placeholder="Veuillez saisir le numero du produit"required>

                <label for="id_commande">numero_commande <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $ligne_commande['id_commande'] : "" ?>" type="number" name="id_commande" id="id_commande" placeholder="Veuillez saisir le numero de commande"required>
                
                <label for="date">date <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $ligne_commande['date'] : "" ?>" type="date" name="date" id="date" placeholder="Veuillez saisir la date"required>

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