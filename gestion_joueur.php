<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Joueurs</title>
    <script src="javaScript\gestion_joueur.js"></script>
    <link rel="stylesheet" type="text/css" href="style\gestion_joueur.css">
</head>
<body>
    <h2>Gestion des Joueurs</h2>

    <?php
    include 'config.php';

    function afficherJoueurs() {
        global $connexion;

        $sql = "SELECT * FROM utilisateurs WHERE role='joueur'";
        $result = $connexion->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Téléphone</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr id='row_" . $row['id'] . "'>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['prenom'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['telephone'] . "</td>";
                echo "<td>";
                echo "<button onclick='supprimerJoueur(" . $row['id'] . ")'>Supprimer</button> ";
                echo "<button onclick='bloquerDebloquerJoueur(" . $row['id'] . ", \"bloquer\")'>Bloquer</button> ";
                echo "<button onclick='bloquerDebloquerJoueur(" . $row['id'] . ", \"debloquer\")'>Débloquer</button>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Aucun joueur trouvé.";
        }
    }

    afficherJoueurs();

    $connexion->close();
    ?>

    <a href="acceuil_admin.php">Retour à l'accueil</a>
</body>
</html>