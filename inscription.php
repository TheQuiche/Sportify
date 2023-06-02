<?php
// Vérifier si le formulaire a été soumis
if (isset($_POST['Soumettre'])) {
    // Vérifier si tous les champs requis sont remplis
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['ID']) && !empty($_POST['Email']) && !empty($_POST['mdp']) && !empty($_POST['Etablissement']) && !empty($_POST['type'])) {
        // Récupérer les valeurs du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $ID = $_POST['ID'];
        $email = $_POST['Email'];
        $mdp = $_POST['mdp'];
        $etablissement = $_POST['Etablissement'];
        $type = $_POST['type'];

        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "espace_membre";

        $conn = new mysqli($servername, $username, $password_db, $dbname);

        // Vérifier si la connexion a échoué
        if ($conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $conn->connect_error);
        }

        // Préparer la requête SQL pour insérer les données dans la table d'inscription
        $sql = "INSERT INTO inscription (nom, prenom, identifiant, email, mdp, etablissement, type) VALUES ('$nom', '$prenom', '$ID', '$email', '$mdp', '$etablissement', '$type')";

        // Exécuter la requête SQL
        if ($conn->query($sql) === TRUE) {
            header("Location: compte.html"); // Redirection vers une autre page HTML
            exit();
        } else {
            echo "Erreur lors de l'inscription : " . $conn->error;
        }

        // Fermer la connexion à la base de données
        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
