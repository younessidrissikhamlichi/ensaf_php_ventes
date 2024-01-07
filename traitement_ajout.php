<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    $image = file_get_contents($_FILES['image']['tmp_name']); // Récupérer les données binaires de l'image
    $image = addslashes($image); // Échapper les caractères spéciaux dans l'image pour éviter les erreurs d'insertion

    $sql = "INSERT INTO vetements (nom, description, prix, image_data) VALUES ('$nom', '$description', $prix, '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "Vêtement ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du vêtement : " . $conn->error;
    }
}
