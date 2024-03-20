<?php
session_start();

if (isset($_SESSION['id'])) {
    header("Location: acceuil_joueur.php");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $login = $_POST['login'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "INSERT INTO utilisateurs (nom, prenom, email, telephone, login, mot_de_passe, role) 
            VALUES ('$nom', '$prenom', '$email', '$telephone', '$login', '$mot_de_passe', 'joueur')";

    if ($connexion->query($sql) === TRUE) {
        header("Location: login.php?inscription_success=true");
        exit();
    } else {
        echo "Erreur: " . $sql . "<br>" . $connexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Joueur</title>
    <link rel="stylesheet" type="text/css" href="style\inscription_joueur.css">
</head>
<body>
    <div class="slide">
        <div class="header">
            S'inscrire comme joueur
        </div>
        <form id="inscriptionForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="rectangle">
                <input type="text" id="nom" name="nom" placeholder="Nom" required><br><br>
            </div>
            <div class="rectangle">
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" required><br><br>
            </div>
            <div class="rectangle">
                <input type="email" id="email" name="email" placeholder="E-mail" required><br><br>
            </div>
            <div class="rectangle">
                <input type="text" id="telephone" name="telephone" placeholder="Téléphone" required><br><br>
            </div>
            <div class="rectangle">
                <input type="text" id="login" name="login" placeholder="Login" required><br><br>
            </div>
            <div class="rectangle">
                <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required><br><br>
            </div>
            <div class="rectangle">
                <input type="password" id="mot_de_passe_conf" name="mot_de_passe_conf" placeholder="Confirmer le mot de passe" required><br><br>
            </div>
            <div class="rectangle">
                <input type="submit" value="S'inscrire">
            </div>
        </form>
    </div>

    <script src="javascript/inscription_joueur.js"></script>
</body>
</html>