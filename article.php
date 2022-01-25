<?php 

    $base_de_donnee = new PDO('mysql:dbname=articles_php_cours;host=localhost;charset=UTF8', 'root', '');

    $requete = $base_de_donnee -> prepare('SELECT * FROM articles WHERE id = ?'); // LE ? SERT A EMPECHER LES INJECTIONS SQL POUR PLUS DE SECURITE

    $requete -> execute([ $_GET['id'] ]); // LE GET ID SE MET ICI POUR ENVOYER L'ID VERS LE ?

    $articles = $requete ->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Article</title>

    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./index.css">
    <script src="./bootstrap.min.js" defer></script>

</head>

<body>
    
    <h1><?= $articles['titre'] ?></h1>
    
    <h2><?= $articles['description'] ?></h2>
    <h3><?= $articles['description_sous_categorie'] ?></h3>
    
    <img src="./images/<?= $articles['image'] ?>" alt="image">
    
    <p class="text-center"><?= $articles['texte'] ?></p>

</body>
</html>