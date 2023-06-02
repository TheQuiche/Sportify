<?php
// Vérifier si la valeur de recherche existe et n'est pas vide
if (isset($_GET['searchInput']) && !empty($_GET['searchInput'])) {
    // Récupérer la valeur de recherche
    $searchInput = $_GET['searchInput'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "recherche";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Vérifier si la connexion a échoué
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Échapper les caractères spéciaux dans la valeur de recherche pour éviter les injections SQL
    $searchInput = mysqli_real_escape_string($conn, $searchInput);

    // Effectuer la requête de recherche
    $sql = "SELECT * FROM coach WHERE Nom LIKE '%$searchInput%' OR Prenom LIKE '%$searchInput%' OR Sport LIKE '%$searchInput%' OR Etablissement LIKE '%$searchInput%'";
    $result = $conn->query($sql);

    // Générer le HTML pour les résultats de recherche
  if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<a href="#">' . $row['Nom'] . ' ' . $row['Prenom'] . '</a><br>';
            echo '<p>Sport enseigné : ' . $row['Sport'] . '</p>';
            echo '<p>Établissement : ' . $row['Etablissement'] . '</p>';
            echo '<br>';
        }
    } else {
        echo 'Aucun résultat trouvé.';
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    echo 'Veuillez entrer un terme de recherche.';
}
?>
