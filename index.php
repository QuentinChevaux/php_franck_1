<?php

    session_start();

    $base_de_donnee = new PDO('mysql:dbname=articles_php_cours;host=localhost;charset=UTF8', 'root', '');

    $requete = $base_de_donnee -> prepare('SELECT * FROM articles');

    $requete -> execute(); 

    $articles = $requete ->fetchAll();

    $titreIndex = 'Titre de l&apos;Index';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Franck 1</title>

    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./index.css">
    <script src="./bootstrap.min.js" defer></script>

</head>

<body>

    <!-- NavBar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link active" href="#">Home
                <span class="visually-hidden">(current)</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
        </div>
        </nav>

    <!-- Fin NavBar -->

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

</body>
</html>
