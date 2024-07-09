<?php
require_once './vendor/autoload.php';
use Utils\Tools;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation PHP Avancé - Accueil</title>
    <?php
    include './src/includes/headcalls.php';
    ?>
</head>
<body>
    <?php
    include './src/includes/header.php';
    ?>
    <?php
    include './src/includes/navigation.php';
    ?>
    <main class="container">
        <section class="row">
            <article class="col-lg-6 offset-lg-3">
                <header>
                    <h2>Gestion des jeux</h2>
                </header>
                
                    <h3>Modifier le jeu </h3>
                    <form method="post" action="./actionJV.php">
                        <input type="hidden" name="ID" value="" />
                        <fieldset class="form-group my-2">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" value="" />
                        </fieldset>
                        <fieldset class="form-group my-2">
                            <label for="possesseur" class="form-label">Possesseur</label>
                            <input type="text" class="form-control" name="possesseur" id="possesseur" value="" />
                        </fieldset>
                        <fieldset class="form-group my-2">
                            <label for="console" class="form-label">COnsole</label>
                            <input type="text" class="form-control" name="console" id="console" value="" />
                        </fieldset>
                        <fieldset class="form-group my-2">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" class="form-control" name="prix" id="prix" value="" />
                        </fieldset>
                        <fieldset class="form-group my-2">
                            <label for="nbJmax" class="form-label">Nombre de joueurs max</label>
                            <input type="text" class="form-control" name="nbre_joueurs_max" id="nbre_joueurs_max" value="" />
                        </fieldset>
                        <fieldset class="form-group my-2">
                            <label for="commentaires" class="form-label">Commentaire</label>
                            <input type="text" class="form-control" name="commentaires" id="commentaires" value="" />
                        </fieldset>
                        <p class="my-2">
                            <button class="btn btn-outline-primary" name="modJeu" type="submit" value="modJeu">Modifier le jeu</button>
                        </p>
                    </form>
                    
                    <h3>Supprimer le jeu <?php echo $nom ?></h3>
                    <form method="post" action="./actionJV.php">
                        <input type="hidden" name="ID" value="" />
                        Êtes-vous sûr de vouloir supprimer le jeu suivant : <b></b> ?
                        <p class="my-2">
                            <button class="btn btn-outline-danger" name="supJeu" type="submit" value="supJeu">Supprimer le jeu</button>
                            <a href="./pdo.php"><button class="btn btn-outline-secondary" type="button">Annuler</button></a>
                        </p>
                    </form>
            </article>
        </section>
    </main>
    <?php
    include './src/includes/footer.php';
    ?>
</body>
</html>