<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/monstyle.css">

<body>
    <?php
    session_start();
    require_once('config.php');

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: connexion.php');
        exit;
    }

    $sql = "SELECT id, nom, description, prix, image_data FROM vetements";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image_data']) . '" alt="Image du vêtement">';
            echo "<div class='card-body'>";
            echo "<h3 class='card-title'>" . $row['nom'] . "</h3>";
            echo "<p class='card-text'>Description: " . $row['description'] . "</p>";
            echo "<p class='card-text'>Prix: " . $row['prix'] . "</p>";
            echo "</div></div>";
        }
    } else {
        echo "Aucun vêtement disponible.";
    }

    ?>
    
    <!-- Lien de déconnexion -->
    <a href="deconnexion.php">Se déconnecter</a>
</body>

</html>