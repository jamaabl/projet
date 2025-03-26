<?php
include("configtabe.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $date_debut = mysqli_real_escape_string($con, $_POST['date_debut']);
    $date_fin = mysqli_real_escape_string($con, $_POST['date_fin']);
    $visibilite = mysqli_real_escape_string($con, $_POST['visibilite']);
    $fond = mysqli_real_escape_string($con, $_POST['fond']);

    if (empty($nom)) {
        echo json_encode(["success" => false, "message" => "Le nom du tableau est obligatoire"]);
        exit();
    }

    $query = "INSERT INTO tableaux (nom, description, date_debut, date_fin, visibilite, fond) 
              VALUES ('$nom', '$description', '$date_debut', '$date_fin', '$visibilite', '$fond')";

    if (mysqli_query($con, $query)) {
        echo json_encode(["success" => true]);
        
    } else {
        echo json_encode(["success" => false, "message" => mysqli_error($con)]);
    }
    exit();
}
?>
