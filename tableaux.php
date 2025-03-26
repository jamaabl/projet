<?php
include("configtabe.php");
$result = mysqli_query($con, "SELECT * FROM tableaux");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableaux</title>
    <link rel="stylesheet" href="exx.css">
    <!-- Lien vers Bootstrap CDN pour améliorer la présentation -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Gestion des Projets</h2>

    <!-- Bordure avec barre de recherche -->
    <div class="border p-4 mb-4">
        <div class="d-flex justify-content-between">
        <a href="creer_tableau.php" class="btn btn-primary">Add New Project</a>
            <!-- Barre de recherche -->
            <input type="text" id="searchInput" class="form-control w-50" placeholder="Rechercher un projet..." onkeyup="searchProjects()">
        </div>
    </div>
    <h2>Tableaux créés</h2>
    <table id="tableaux">
    <thead>
        <tr>
            <th>Nom</th><br>
            <th>Description</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Visibilité</th>
            <th>Fond</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nom']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td><?php echo htmlspecialchars($row['date_debut']); ?></td>
                <td><?php echo htmlspecialchars($row['date_fin']); ?></td>
                <td><?php echo htmlspecialchars($row['visibilite']); ?></td>
                <td><?php echo htmlspecialchars($row['fond']); ?></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
</div>
</body>
</html>