<?php
 include("configtabe.php");
  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un Tableau</title>
    <link rel="stylesheet" href="s.css">
</head>
<body>
    <section class="form-section">
        <div class="form-container">
            <h2>Créer un Nouveau Tableau</h2>
            <form id="projectForm" >
                <label>Nom du tableau :</label>
                <input type="text" name="nom" id="nom" required>

                <label>Description :</label>
                <input type="text" name="description" id="description" required>

                <label>Date de début :</label>
                <input type="date" name="date_debut" id="date_debut" required>

                <label>Date de fin :</label>
                <input type="date" name="date_fin" id="date_fin" required>

                <label>Visibilité :</label>
                <select name="visibilite" id="visibilite">
                    <option value="prive">Privé</option>
                    <option value="workspace">Espace de travail</option>
                    <option value="public">Public</option>
                </select>

                <label>Fond :</label>
                <select name="fond" id="fond">
                    <option value="bleu">Bleu</option>
                    <option value="vert">Vert</option>
                    <option value="rouge">Rouge</option>
                    <option value="personnalise">Personnalisé</option>
                </select>

                <button type="submit">Créer</button>
                <a href="Hauss.php" class="cancel-btn">X Annuler</a>
            </form>
        </div>
    </section>

    <script>
        document.getElementById("projectForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch("ajouter_tableau.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = "salma.html"; // Redirige vers la page d'affichage
        } else {
            alert("Erreur : " + data.message);
        }
    })
    .catch(error => console.error("Erreur :", error));
});

    </script>
</body>
</html>
