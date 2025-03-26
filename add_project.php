<?php
include("configtab.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $etat = $_POST['etat'];

    $query = "INSERT INTO projects (nom, description, date_debut, date_fin, etat) 
              VALUES ('$nom', '$description', '$date_debut', '$date_fin', '$etat')";

    if (mysqli_query($con, $query)) {
        if (mysqli_query($con, $query)) {
            // Récupération des données du projet ajouté (ID auto-incrémenté)
            $last_id = mysqli_insert_id($con);
    
            // Créer la réponse JSON avec les données du projet ajouté
            $response = [
                'success' => true,
                'project' => [
                    'id' => $last_id,
                    'nom' => $nom,
                    'description' => $description,
                    'date_debut' => $date_debut,
                    'date_fin' => $date_fin,
                    'etat' => $etat
                ]
            ];
        } else {
            $response = [
                'success' => false
            ];
        }
    
        // Retourne la réponse JSON
        echo json_encode($response);
    }
    }
?>