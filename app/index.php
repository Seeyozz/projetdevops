<?php
$servername = "mysql-service.projet";
$username = "username";
$password = "password";
$dbname = "messagerie";
$port = 3306;

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Créer la table messages si elle n'existe pas
$createTable = "CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL
)";
if (!$conn->query($createTable)) {
    echo "<p>" . "Erreur lors de la création de la table: " . $conn->error . "</p>";
    die("Erreur lors de la création de la table: " . $conn->error);
}

// Traiter le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $conn->real_escape_string($_POST['message']);
    $sql = "INSERT INTO messages (message) VALUES ('$message')";

    if (!$conn->query($sql)) {
        echo "Erreur : " . $conn->error;
    }
}

// Récupérer les messages
$sql = "SELECT id, message FROM messages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Messagerie</title>
</head>
<body>
    <h2>Envoyer un message</h2>
    <form method="post" action="index.php">
        <textarea name="message"></textarea>
        <br>
        <input type="submit" value="Envoyer">
    </form>

    <h2>Messages</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>" . $row["message"] . "</p>";
        }
    } else {
        echo "Pas de messages";
    }
    $conn->close();
    ?>
</body>
</html>
