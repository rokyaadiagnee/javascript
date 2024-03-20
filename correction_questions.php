<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correction des questions</title>
    <link rel="stylesheet" type="text/css" href="style\correction.css">
</head>
<body>
    <div id="rectangle-11">
        <h2>Correction des questions</h2>
        <?php
        session_start();

        if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'joueur') {
            header("Location: index.php");
            exit();
        }

        include 'config.php';

        $id_utilisateur = $_SESSION['id'];

        $id_session_quizz = $_SESSION['id_session_quizz'];

        $sql_reponses_joueur = "SELECT * FROM Reponses_joueur WHERE id_utilisateur = $id_utilisateur AND id_session_quizz = $id_session_quizz";
        $result_reponses_joueur = $connexion->query($sql_reponses_joueur);

        if ($result_reponses_joueur->num_rows > 0) {
            $reponses_joueur = array();
            while ($row_reponse = $result_reponses_joueur->fetch_assoc()) {
                $reponses_joueur[] = $row_reponse;
            }
        } else {
            header("Location: error.php");
            exit();
        }

        $sql_reponses_correctes = "SELECT * FROM questions";
        $result_reponses_correctes = $connexion->query($sql_reponses_correctes);

        if ($result_reponses_correctes->num_rows > 0) {
            $reponses_correctes = array();
            while ($row_reponse_correcte = $result_reponses_correctes->fetch_assoc()) {
                $reponses_correctes[] = $row_reponse_correcte;
            }
        } else {
            header("Location: error.php");
            exit();
        }

        $score = 0;
        for ($i = 0; $i < count($reponses_joueur); $i++) {
            echo "<p><strong>Question " . ($i + 1) . "</strong><br>";
            echo "Réponse du joueur : " . $reponses_joueur[$i]['reponse'] . "<br>";
            echo "Réponse correcte : " . $reponses_correctes[$i]['reponse_correcte'] . "</p>";
            if ($reponses_joueur[$i]['reponse'] == $reponses_correctes[$i]['reponse_correcte']) {
                $score++;
            }
        }

        $date_score = date("Y-m-d H:i:s");
        $sql_save_score = "INSERT INTO scores (id_utilisateur, score, date_score) VALUES ($id_utilisateur, $score, '$date_score')";
        $connexion->query($sql_save_score);

        echo "<p>Votre score est : " . $score . "</p>";
        ?>
        <br>
        <a href="acceuil_joueur.php">Accueil</a><br>
        <a href="logout.php">Déconnexion</a><br>
        <a href="question.php">Recommencer le jeu</a>
    </div>
</body>
</html>