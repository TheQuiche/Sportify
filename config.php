// FICHIER PHP - Configuration de la base de données

<?php
// Configuration de la base de données
$servername = "localhost"; // Nom du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "sportify"; // Nom de la base de données

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
  die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}
?>
