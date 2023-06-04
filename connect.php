
<?php
//FICHIER PHP - Connexion pour la session de chat

session_start();
include('config.php'); // Inclure le fichier de configuration de la base de données

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Vérification des identifiants dans la table `client`
  $query = "SELECT * FROM client WHERE email='$email' AND mot_de_passe='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['client_id'] = $row['id']; // Enregistrez l'ID du client dans la session

    header("Location: chatroom.php"); // Redirige vers la page du chatroom
    exit();
  } else {
    // Vérification des identifiants dans la table `specialiste`
    $query = "SELECT * FROM specialiste WHERE email='$email' AND mdp='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['specialiste_id'] = $row['id']; // Enregistrez l'ID du spécialiste dans la session

      header("Location: chat.html"); // Redirige vers la page du chatroom
      exit();
    } else {
      $error_message = "Identifiants incorrects";
    }
  }
}
?>