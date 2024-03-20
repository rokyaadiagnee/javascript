<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizz";

$connexion = new mysqli($servername, $username, $password, $dbname);

if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}
?>