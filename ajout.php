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
    <div class="container">
        <h2>Ajout d'un article</h2>

        <form method="post" action="traitement_ajout.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom">Nom du v&ecirc;tements : </label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du vêtement" required><br>
                <label for="description">Description : </label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description du vêtement" required><br>
                <label for="prix">Prix : </label>
                <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix du vêtement" required><br>
                <input type="file" class="form-control" name="image" required><br>
                <input type="submit" class="btn btn-primary" value="Ajouter">
            </div>
        </form>
    </div>

</body>

</html>