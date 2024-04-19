<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "modules";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$type = $_POST['type'];

$sql = "INSERT INTO module (nom, description) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $type);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Module enregistré avec succès.";
    
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
