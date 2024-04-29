// connexion a la base de donnees Tamwofing
<?php 
define("USER", "root");
define("PASSWORD", "");
define("SERVER", "localhost");
define("DBNAME", "secel_gestion1");

// definition du connecteur
$connector = "mysql:dbname=" . 'secel_gestion1' . ";host=" . 'localhost';
echo"bonne connexion";
// acces a la base de donnees
try {
    $connexion = new PDO($connector, USER, PASSWORD);
} catch (PDOExeption $e) {
    echo $e->getMessage();
}
?>
