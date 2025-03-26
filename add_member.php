<?php
include("configmembre.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Vérifier si l'email existe déjà
    $check = $conn->prepare("SELECT * FROM membres WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "Ce membre est déjà enregistré.";
    } else {
        $username = $_POST['username'];
        $stmt = $conn->prepare("INSERT INTO membres (username, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $email);
        if ($stmt->execute()) {
            echo "Membre ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout.";
        }
    }
}
?>
