<?php
include 'connexion.php';
if (
    !empty($_POST['id_commande'])
    && !empty($_POST['num_client'])
    && !empty($_POST['id_personnel'])
    && !empty($_POST['nrbre_commande'])
    && !empty($_POST['date_commande'])
) {

    $sql = "INSERT INTO secel_gestion1.commande(id_commande, num_client, id_personnel, nrbre_commande,date_commande)
            VALUES(?, ?, ?, ?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['id_commande'],
        $_POST['num_client'],
        $_POST['id_personnel'],
        $_POST['nrbre_commande'],
        $_POST['date_commande'],
        ) );

        if ($req->rowCount() != 0) {
            $_SESSION['message']['text'] = "commande effectué avec succès";
            $_SESSION['message']['type'] = "success";
        } else {
            $_SESSION['message']['text'] = "Impossible de faire cette commande";
            $_SESSION['message']['type'] = "danger";
        }
}
 else {
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
</head>
<body  style="background-image: url(images/B.jpg)";>>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="" method="post"enctype="multipart/form.data">
                <input value="<?= !empty($_GET['id']) ?  $commande['id'] : "" ?>" type="hidden" name="id" id="id">

                <label for="id_commande">numero_commande <span class="text-danger">*</span></label>
                <input onkeyup="setPrix()" value="<?= !empty($_GET['id']) ?  $commande['id_commande'] : "" ?>" type="number" name="id_commande" id="id_commande" placeholder="Veuillez saisir le numero" required>
                <label for="num_client">numero_client <span class="text-danger">*</label>
                <input  onkeyup="setPrix()" value="<?= !empty($_GET['id']) ?  $commande['num_client'] : "" ?>" type="number" name="num_client" id="num_client" placeholder="Veuillez saisir le numero" required>>
                <label for="id_personnel">numero_personnel <span class="text-danger">*</label>
                <input onkeyup="setPrix()" value="<?= !empty($_GET['id']) ?  $commande['id_personnel'] : "" ?>" type="number" name="id_personnel" id="id_personnel" placeholder="Veuillez saisir le numero"required>

                <label for="nrbre_commande">nombre_commande <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $commande['nrbre_commande'] : "" ?>" type="number" name="nrbre_commande" id="nrbre_commande" placeholder="Veuillez saisir le nrbre_commande"required>
                <label for="date_commande">date_commande <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $commande['date_commande'] : "" ?>" type="date" name="date_commande" id="nrbre_commande" placeholder="Veuillez saisir la date"required>


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
</section>
</script>