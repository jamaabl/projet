<?php include("configmembre.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Membres</title>
    <link rel="stylesheet" href="dexe.css">
</head>
<body>

    <div class="container">
        <h2>Membres</h2>

        <div class="search-container">
            <input type="text" id="search" placeholder="Rechercher un membre...">
            <button id="clear-search">&times;</button>
        </div>

        <ul id="member-list"></ul>

         <!-- Boutons regroupés dans un div -->
    <div class="button-group">
        <a href="invite.php" class="invite-button">Inviter un membre</a>
        <a href="salma.html" class="back-button">↩ Go back</a>
    </div>
    </div>

    <script>
       document.addEventListener("DOMContentLoaded", function () {
    // Sélection des éléments HTML nécessaires
    const searchInput = document.getElementById("search"); // Champ de recherche
    const clearSearch = document.getElementById("clear-search"); // Bouton pour effacer la recherche
    const memberList = document.getElementById("member-list"); // Liste des membres

    // Fonction pour charger la liste des membres depuis la base de données
    function loadMembers() {
        fetch("set_members.php") // Appel de l'API pour récupérer les membres
            .then(response => response.json()) // Conversion de la réponse en JSON
            .then(data => {
                memberList.innerHTML = ""; // Réinitialiser la liste des membres avant d'ajouter les nouveaux

                // Boucle à travers les membres récupérés et affichage dans la liste
                data.forEach(member => {
                    const li = document.createElement("li"); // Création d'un élément <li> pour chaque membre

                    // Insertion des informations du membre dans l'élément <li>
                    li.innerHTML = `
                        <div class="member-info">
                            <span class="member-name">${member.username}</span>
                            <span class="member-email">${member.email}</span>
                        </div>
                    `;

                    memberList.appendChild(li); // Ajout de l'élément à la liste des membres
                });
            })
            .catch(error => console.error("Erreur lors du chargement des membres :", error)); // Gestion des erreurs
    }

    // Appeler la fonction pour charger les membres au chargement de la page
    loadMembers();

    // Recherche dynamique des membres
    searchInput.addEventListener("input", function () {
        const searchText = searchInput.value.toLowerCase(); // Récupération du texte saisi, en minuscules

        // Parcourir chaque élément de la liste et filtrer les résultats
        document.querySelectorAll("#member-list li").forEach(li => {
            const name = li.querySelector(".member-name").textContent.toLowerCase(); // Nom du membre en minuscules
            const email = li.querySelector(".member-email").textContent.toLowerCase(); // Email en minuscules

            // Vérifier si le texte recherché correspond au nom ou à l'email
            if (name.includes(searchText) || email.includes(searchText)) {
                li.style.display = "flex"; // Afficher l'élément correspondant
            } else {
                li.style.display = "none"; // Masquer les éléments non correspondants
            }
        });
    });

    // Effacer le champ de recherche et afficher tous les membres
    clearSearch.addEventListener("click", function () {
        searchInput.value = ""; // Réinitialisation du champ de recherche
        searchInput.dispatchEvent(new Event("input")); // Simuler un événement "input" pour rafraîchir l'affichage
    });
});
 
    </script>
</body>
</html>
