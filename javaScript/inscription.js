document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const nom = document.getElementById("nom").value.trim();
        const prenom = document.getElementById("prenom").value.trim();
        const login = document.getElementById("login").value.trim();
        const email = document.getElementById("email").value.trim();
        const telephone = document.getElementById("telephone").value.trim();
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmPassword").value;

        if (nom === "" || prenom === "" || login === "" || email === "" || telephone === "" || password === "" || confirmPassword === "") {
            alert("Tous les champs sont obligatoires.");
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Veuillez saisir une adresse e-mail valide.");
            return;
        }
        if (telephone === "") {
            alert("Veuillez saisir un numéro de téléphone.");
            return;
        }
        if (password !== confirmPassword) {
            alert("Les mots de passe ne correspondent pas.");
            return;
        }
        form.submit();
    });
});