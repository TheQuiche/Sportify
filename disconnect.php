
<?php
// FICHIER PHP : Déconnexion de la session de chat

session_start();
include('config.php'); // Inclure le fichier de configuration de la base de données

if (isset($_SESSION['id'])) {
    // Récupérer l'ID de l'utilisateur connecté
    $userId = $_SESSION['id'];

    // Récupérer tous les messages non enregistrés de l'utilisateur
    $sql = "SELECT * FROM messages WHERE sender_id = '$userId' AND is_saved = 0";
    $result = mysqli_query($conn, $sql);

    // Parcourir les messages et les enregistrer
    while ($row = mysqli_fetch_assoc($result)) {
        $messageId = $row['id'];
        $message = $row['message'];

        // Mettre à jour le statut du message pour indiquer qu'il est enregistré
        $updateSql = "UPDATE messages SET is_saved = 1 WHERE id = '$messageId'";
        mysqli_query($conn, $updateSql);
    }

    // Déconnecter l'utilisateur en détruisant la session
    session_destroy();

    // Rediriger vers la page de connexion ou toute autre page souhaitée
    header("Location: connect.php");
    exit();
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connect.php");
    exit();
}
?>
