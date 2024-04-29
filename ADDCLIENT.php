<?php
require_once "connexion.php";
if(
    !empty($_POST['num_client'])
    &&!empty($_POST['nom_client'])
    &&!empty($_POST['adr_client'])
    
){
    $sql="INSERT INTO secel_gestion1.client(num_client,nom_client,adr_client)VALUES(?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['num_client'],
         $_POST['nom_client'],
         $_POST['adr_client'],
    ));


    if ( $req->rowCount()!=0){
        $_SESSION['message']['text'] = "compte créé avec succès";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de la creation du compte";
        $_SESSION['message']['type'] = "danger";
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
<link rel="stylesheet" href="style1.css">
 <link rel="stylesheet" href="moncss2.css">
<body  style="background-image: url(images/B.jpg);>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="" method="post"enctype="multipart/form.data">
                <label for="num_client">num_client <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $client['num_client'] : "" ?>" type="number" name="num_client" id="num_client" placeholder="Veuillez saisir le numero"required>
                <input value="<?= !empty($_GET['id']) ?  $client['id'] : "" ?>" type="hidden" name="id" id="id" >
                
                <label for="nom_client">NOM <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $client['nom_client'] : "" ?>" type="text" name="nom_client" id="nom_client" placeholder="Veuillez saisir le nom"required>

                <label for="adr_client">Adresse <span class="text-danger">*</span></label>
                <input value="<?= !empty($_GET['id']) ?  $client['adr_client'] : "" ?>" type="text" name="adr_client" id="adr_client" placeholder="Veuillez saisir l'adresse"required>
    
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
<?php
?>

