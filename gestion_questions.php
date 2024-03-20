<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Questions</title>
    <script src="javaScript\gestion_question.js"></script>
</head>
<body>
    <h2>Gestion des Questions</h2>

    <?php
    include 'config.php';

    function afficherQuestions() {
        global $connexion;

        $sql = "SELECT * FROM questions";
        $result = $connexion->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Question</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr id='row_" . $row['id'] . "'>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['question'] . "</td>";
                echo "<td>";
                echo "<button onclick='masquerQuestion(" . $row['id'] . ")'>Masquer</button> ";
                echo "<button onclick='supprimerQuestion(" . $row['id'] . ")'>Supprimer</button>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Aucune question trouvée.";
        }
    }

    afficherQuestions();

    $connexion->close();
    ?>

    <h3>Ajouter une Nouvelle Question</h3>
    <form method="post" action="ajouter_question.php">
        <label for="question">Question :</label><br>
        <input type="text" id="question" name="question" required><br>
        <label for="option1">Option 1 :</label><br>
        <input type="text" id="option1" name="option1" required><br>
        <label for="option2">Option 2 :</label><br>
        <input type="text" id="option2" name="option2" required><br>
        <label for="option3">Option 3 :</label><br>
        <input type="text" id="option3" name="option3" required><br>
        <label for="option4">Option 4 :</label><br>
        <input type="text" id="option4" name="option4" required><br>
        <label for="reponse">Réponse :</label><br>
        <input type="text" id="reponse" name="reponse" required><br>
        <label for="reponse_correcte">Réponse Correcte :</label><br>
        <input type="text" id="reponse_correcte" name="reponse_correcte" required><br><br>
        <input type="submit" value="Ajouter Question">
    </form>

    <a href="acceuil_admin.php">Retour à l'accueil</a>
</body>
</html>