<?php

session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification des identifiants dans la base de données
    $sql = "SELECT `id`, `username`, `password_hash`, `role` FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the user entered correct password
        if (password_verify($password, $row["password_hash"])) {
            // Si les identifiants sont corrects, on définit la session et le cookie
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $role = $row['role'];

            // Définir un cookie pour garder l'utilisateur connecté pendant une période de temps spécifiée (ici 1 heure)
            setcookie('remember_user', $username, time() + 3600, '/'); // Modifier les paramètres selon vos besoins

            // Vérification du rôle de l'utilisateur
            if ($role == 'admin') {
                header("location: ajout.php");
                exit;
            } else {
                header('Location: vetements.php'); // Redirection vers la page des vêtements après connexion
                exit;
            }
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/monstyle.css">
</head>

<body>

    <!-- Formulaire de connexion -->
    <form action="" method="post">
        <div class="container">
            <!-- Titre du formulaire -->
            <h2>Connexion</h2>
            <div class="form-group">

                <!-- Champs pour le nom d'utilisateur et le mot de passe -->
                <label for="username">Nom d'utilisateur : </label>
                <input class="form-control" type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
                <br>
                <label for="password">Mot de passe : </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                <br>
                <!-- Bouton de validation -->
                <input type="submit" value="Se connecter" class="btn btn-primary">
                <a href="inscription.php" class="btn btn-secondary">S'enregistrer</a>
            </div>
        </div>

    </form>
</body>

</html>