<?php
session_start(); 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style\login.css">
    <script src="javaScript\login.js"></script>
</head>
<body>
    <h2 class="connexion-title">Connexion</h2>
    <div class="login-form">
        <form action="login_process.php" method="post" onsubmit="return validateForm()">
            <div class="rectangle">
                <p class="rectangle-label">E-mail ou Téléphone:</p>
                <input type="text" id="identifier" name="identifier" required>
            </div>
            <br><br>
            <div class="rectangle">
                <p class="rectangle-label">Mot de passe:</p>
                <input type="password" id="password" name="password" required>
            </div>
            <br><br>
            <input type="submit" value="Se connecter">
        </form>
    </div>
    <a class="create-account" href="inscription_joueur.php">Créer un compte!</a>
</body>
</html>