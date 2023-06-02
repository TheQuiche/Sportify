<?php
// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["email"];
    $mdp = $_POST["password"];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "connexion";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Vérifier si la connexion a échoué
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Échapper les données pour éviter les attaques par injection SQL
    $Email = mysqli_real_escape_string($conn, $Email);
    $mdp = mysqli_real_escape_string($conn, $mdp);

    // Requête SQL pour vérifier les données du client
    $sql = "SELECT * FROM client WHERE Email='$Email' AND mdp='$mdp'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Le client existe dans la base de données
        header("Location: profil_client.html"); // Redirection vers une autre page HTML
        exit(); // Terminer le script pour éviter toute exécution supplémentaire
    } else {
        // Le client n'existe pas ou les informations d'identification sont incorrectes
        echo "Identifiants invalides!";
    }

    $conn->close();
}
?>

