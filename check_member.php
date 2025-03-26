<?php
include("configmembre.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Vérifier si l'email existe déjà
    $check = $conn->prepare("SELECT * FROM membres WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    // Retourner si l'utilisateur existe ou non
    if ($result->num_rows > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}
?>
