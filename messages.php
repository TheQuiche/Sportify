<?php
// start the session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>
    <meta http-equiv="refresh" content="100"><!--Pour recharger la page toutes les content secondes ici-->

    <link rel="stylesheet" href="chatroom.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div>

        <div>
            <div></div>
            <?php
            $database = "sportify";
            $db_handle = mysqli_connect("localhost", "root", "");
            $db_found = mysqli_select_db($db_handle, $database);

            $contenu = $_POST["contenu"];
            $heure_actuelle = date("H:i:s");
            $ID_emetteur = '1'; // Remplacez par la valeur correspondante pour l'émetteur (client ou spécialiste)

            if (!empty($contenu)) {
                $requete = $db_handle->prepare("INSERT INTO chatroom(client_id, specialiste_id, date, heure, contenu_message,message_id) values (?, ?, CURDATE(), ?, ?;?)");
                $requete->bind_param("iiss", $ID_emetteur, $ID_emetteur, $heure_actuelle, $contenu);
                $requete->execute();
                $contenu = NULL; // Pour éviter que le message se renvoie
            }

            $sql = "SELECT * FROM chatroom WHERE client_id = '$ID_emetteur' OR specialiste_id = '$ID_emetteur'";
            $result = mysqli_query($db_handle, $sql);

            echo "<div class='chat' id='chatroom'>";
            while ($data = mysqli_fetch_assoc($result)) {
                if ($data["client_id"] == $ID_emetteur) {
                    echo "<div id='texte_droite' class='texte_droite'>";
                    echo "<div id='contenu_message' name='contenu_message'>" . $data["contenu_message"] . "</div><div id='vous' name='vous'>Vous " . $data["heure"] . "</div>";
                    echo "</div>";
                } else {
                    echo "<div id='texte_gauche' class='texte_gauche'>";
                    echo "<div id='contenu_message' name='contenu_message'>" . $data["contenu_message"] . "</div><div id='vous' name='vous'>Coach" . $data["heure"] . "</div>";
                    echo "</div>";
                }
            }
            echo "</div>";

            mysqli_close($db_handle);
            ?>

            <script>
                var chatroom = document.getElementById('chatroom');
                chatroom.scrollTop = chatroom.scrollHeight; // Scroller en bas de la div chatroom
            </script>

            <div>
                <form action="messages.php" method="post"> <!-- Modifier l'action vers messages.php -->
                    <input type="text" name="contenu" placeholder="Votre message" />
                    <input type="submit" value="Envoyer" />
                </form>
            </div>


        </div>
    </div>
</body>
</html>
