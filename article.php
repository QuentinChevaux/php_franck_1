<?php 

    $base_de_donnee = new PDO('mysql:dbname=articles_php_cours;host=localhost;charset=UTF8', 'root', '');

    $requete = $base_de_donnee -> prepare('SELECT * FROM articles');

    $requete -> execute(); 

    $articles = $requete ->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>

<body>
    
    <h1>Titre de l'Article</h1>
    
    <p>Description</p>
    <p>Sous Description</p>
    
    <img src="" alt="image">
    
    <p>Contenu</p>

</body>
</html>