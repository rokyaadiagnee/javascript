<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $login = $_POST['login'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "INSERT INTO utilisateurs (nom, prenom, email, telephone, login, mot_de_passe, role) VALUES (?, ?, ?, ?, ?, ?, 'joueur')";

    $stmt = $connexion->prepare($sql);

    $stmt->bind_param("ssssss", $nom, $prenom, $email, $telephone, $login, $mot_de_passe);

    if ($stmt->execute()) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
}
?>