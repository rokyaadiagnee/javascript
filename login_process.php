<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    $query = "SELECT * FROM utilisateurs WHERE (email='$identifier' OR telephone='$identifier') AND mot_de_passe='$password'";
    $result = $connexion->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row['role'] == 'admin') {
            header("Location: acceuil_admin.php");
        } else {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = 'joueur';
            header("Location: acceuil_joueur.php");
        }
    } else {
        header("Location: index.php");
    }
}
?>
