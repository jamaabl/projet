<?php include("configmembre.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inviter un membre</title>
    <link rel="stylesheet" href="vit.css">
</head>
<body>

    <div class="container">
        <h2>Inviter un membre</h2>
        <input type="text" id="invite-email" placeholder="Adresse e-mail ou nom">
        <button id="invite-btn">Inviter</button>

        <div id="invite-message"></div>

        <!-- Formulaire d'inscription qui sera affiché si l'utilisateur n'est pas trouvé -->
        <div id="signup-form" style="display: none;">
            <h3>Inscription</h3>
            <input type="text" id="username" placeholder="Nom d'utilisateur" required>
            <button id="signup-btn">S'inscrire</button>
        </div>
        <!-- Bouton de retour (toujours affiché) -->
        <a href="Hauss.php" class="back-button">↩Go back</a>
    </div>
    </div>
    <script>
       document.addEventListener("DOMContentLoaded", function () {
    const inviteBtn = document.getElementById("invite-btn");
    const inviteEmail = document.getElementById("invite-email");
    const inviteMessage = document.getElementById("invite-message");
    const signupForm = document.getElementById("signup-form");
    const signupBtn = document.getElementById("signup-btn");
    const usernameInput = document.getElementById("username");

    // Vérifier si l'email existe déjà
    inviteBtn.addEventListener("click", function () {
        let email = inviteEmail.value.trim();

        if (email === "") {
            inviteMessage.innerHTML = `<span class="error">Veuillez saisir un email.</span>`;
            return;
        }

        fetch("check_member.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `email=${email}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                inviteMessage.innerHTML = `
                    <span class="success">Utilisateur trouvé :</span>
                    <ul>
                        <li><strong>Nom :</strong> ${data.username}</li>
                        <li><strong>Email :</strong> ${data.email}</li>
                        <li><strong>Date d'inscription :</strong> ${data.date_inscription}</li>
                    </ul>`;
                signupForm.style.display = "none";
            } else {
                inviteMessage.innerHTML = `<span class="warning">Cet utilisateur n'existe pas. Veuillez l'inscrire.</span>`;
                signupForm.style.display = "block";
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
        });
    });

    // Ajouter un nouvel utilisateur
    signupBtn.addEventListener("click", function () {
        let email = inviteEmail.value.trim();
        let username = usernameInput.value.trim();

        if (username === "") {
            inviteMessage.innerHTML = `<span class="error">Veuillez saisir un nom d'utilisateur.</span>`;
            return;
        }

        fetch("add_member.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `email=${email}&username=${username}`
        })
        .then(response => response.text())
        .then(data => {
            inviteMessage.innerHTML = `<span class="success">${data}</span>`;
            signupForm.style.display = "none";
            inviteEmail.value = "";
            usernameInput.value = "";
        })
        .catch(error => {
            console.error("Erreur :", error);
        });
    });
});

    </script>
</body>
</html>
