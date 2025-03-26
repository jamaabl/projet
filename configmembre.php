<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gestion_members";

// Connexion à la base de données
$conn = new mysqli($host, $user, $pass, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
