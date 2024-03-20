<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'joueur') {
    header("Location: login.php");
    exit();
}

include 'config.php';

$id_joueur = $_SESSION['id'];
$sql_joueur = "SELECT * FROM utilisateurs WHERE id = $id_joueur";
$result_joueur = $connexion->query($sql_joueur);

if ($result_joueur->num_rows > 0) {
    $row_joueur = $result_joueur->fetch_assoc();
} else {
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Joueur</title>
    <link rel="stylesheet" type="text/css" href="style\acceuil_admin.css">
</head>
<body>
    <div class="container">
        <h2>Accueil Joueur</h2>
        <p>Bienvenue, <?php echo $row_joueur['prenom'] . " " . $row_joueur['nom']; ?>!</p>
        <p>Vos informations :</p>
        <ul>
            <li>Nom : <?php echo $row_joueur['nom']; ?></li>
            <li>Prénom : <?php echo $row_joueur['prenom']; ?></li>
            <li>Email : <?php echo $row_joueur['email']; ?></li>
            <li>Téléphone : <?php echo $row_joueur['telephone']; ?></li>
        </ul>
        <a href="question.php">Commencer le jeu</a>
        <a href="logout.php">Déconnexion</a>
    </div>
</body>
</html>