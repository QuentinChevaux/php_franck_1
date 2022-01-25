<?php 

    $base_de_donnee = new PDO('mysql:dbname=articles_php_cours;host=localhost;charset=UTF8', 'root', '');

    $requete = $base_de_donnee -> prepare('SELECT * FROM articles WHERE id = ?'); // LE ? SERT A EMPECHER LES INJECTIONS SQL POUR PLUS DE SECURITE

    $requete -> execute([ $_GET['id'] ]); // LE GET ID SE MET ICI POUR ENVOYER L'ID VERS LE ?

    $articles = $requete ->fetch();

    $title = $articles['titre'];

    include('header.php');
?>
    
    <h1><?= $articles['titre'] ?></h1>
    
    <h2><?= $articles['description'] ?></h2>
    <h3><?= $articles['description_sous_categorie'] ?></h3>
    
    <img src="./images/<?= $articles['image'] ?>" alt="image">
    
    <p class="text-center"><?= $articles['texte'] ?></p>

    
<?= include('footer.php') ?>
