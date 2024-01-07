<?php

// page de connexion à la base de données
$serername = "localhost";
$username = "root";
$password = "";
$dbname = "ensaf_ventes";

$conn = new mysqli($serername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

?>