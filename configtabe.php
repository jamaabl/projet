<?php
// Informations de connexion à la base de données
$serveur = "localhost";   // L'hôte de la base de données (souvent "localhost")
$utilisateur = "root";    // Nom d'utilisateur MySQL (par défaut "root" sur XAMPP)
$mot_de_passe = "";       // Mot de passe MySQL (vide par défaut sur XAMPP)
$base_de_donnees = "gestion_projet"; // Nom de la base de données

// Connexion à MySQL
$con = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier si la connexion a réussi
if (!$con) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

?>


