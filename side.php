<!doctype html>
<html lang="en">
  <head>
  <style>
body{
    background-image:url("SECEL.jpg");
    background-size: cover;
}
</style>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <link rel=" stylesheet" href="style1.css">
        <link rel=" stylesheet" href="moncss.css">
        <link rel=" stylesheet" href="moncss2.css">
  <body  style="background-image: url(images/A.jpg)";>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo square-circle mb-5" style="background-image: url(images/SECEL.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	          <li>
              <a href="#clientSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">CLIENT</a>
              <ul class="collapse list-unstyled" id="clientSubmenu">
                <li>
                    <a href="listeClient.php">liste des clients</a>
                </li>
              </ul>
	          </li>
            <li>
              <a href="#commandeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">COMMANDE</a>
              <ul class="collapse list-unstyled"id="commandeSubmenu">
                <li>
                    <a href="listeCommande.php">liste de commandes</a>
                </li>
              </ul>
	          </li>
            <li>
              <a href="#produitSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">PRODUIT</a>
              <ul class="collapse list-unstyled" id="produitSubmenu">
                <li>
                    <a href="listeProduit.php">liste des produits</a>
                </li>
              </ul>
	          </li>
            <li>
              <a href="#fournisseurSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">FOURNISSEUR</a>
              <ul class="collapse list-unstyled" id="fournisseurSubmenu">
                <li>
                    <a href="listeFournisseur.php">liste des fournisseurs</a>
                </li>
              </ul>
	          </li>
            <li>
              <a href="#ligneSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">COMMANDE-PRODUIT</a>
              <ul class="collapse list-unstyled" id="ligneSubmenu">
                <li>
                    <a href="listeLigne.php">liste des commandes-produits</a>
                </li>
              </ul>
	          </li>
            <li>
              <a href="#personnelSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">PERSONNEL</a>
              <ul class="collapse list-unstyled" id="personnelSubmenu">
                <li>
                    <a href="listePersonnel.php">liste des personnels</a>
                </li>
              </ul>
	          </li>
            
	          <li>
	          </li>
	        </ul>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="search-box">
          <input type="text" placeholder="Recherche..." />
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name">Admin</span>
          <i class="bx bx-chevron-down"></i>
        </div>
      
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="btn"href="index.php">DECONNEXION</a>
              </ul>
            </div>
          </div>
        </nav>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>