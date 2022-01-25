<?php

    session_start();

    $base_de_donnee = new PDO('mysql:dbname=articles_php_cours;host=localhost;charset=UTF8', 'root', '');

    $requete = $base_de_donnee -> prepare('SELECT * FROM articles');

    $requete -> execute(); 

    $articles = $requete ->fetchAll();

    $title = 'Acceuil';

    $titreIndex = 'Titre de l&apos;Index';

    include 'header.php';

?>

    <h1> <?= $titreIndex ?> </h1>

    <div class="container">

        <div class="row justify-content-center">

            <?php 

                foreach($articles as $article) {

            ?>

            <div class="col-6">

                <a href="./article.php?id=<?= $article['id'] ?>" class="text-decoration-none">

                <div class="card mt-3 mb-3">
                    <h3 class="card-header"> <?= $article['titre'] ?> </h3>
                    <div class="card-body">
                        <h5 class="card-title"> <?= $article['description'] ?> </h5>
                        <h6 class="card-subtitle text-muted"> <?= $article['description_sous_categorie'] ?> </h6>
                    </div>
                    <img src="./images/<?= $article['image'] ?>" class="image_card" >
                    <div class="card-body">
                        <p class="card-text"><?= substr($article['texte'], 0, 100) ?>...</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>

                </a>

                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                    <div class="card-footer text-muted">
                         2 days ago
                    </div>
                </div>

            </div>

            <?php

                }

            ?>
    
        </div>

    </div>

    <div class="text-center">
        
        <h2>Login : </h2>
            
        <form class="form-group" action="" method="POST">
        
            <label for="login">Entrez le Login : </label>
            <input class="form-control input_text ms-3" type="text" name="login" />
            
            <label class="ms-3" for="password"> Entrez votre Mot de Passe : </label>
            <input class="form-control input_text ms-3" type="password" name="password" />
            
            <input class="btn ms-3" type="submit" name="valider_login" value="Connexion">
            
        </form>

    </div>

<?= include 'footer.php' ?>