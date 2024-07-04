<?php

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
            <article class="col-lg-8 offset-lg-2">
                <header>
                    <h2>Création d'un compte</h2>
                </header>
                    <h3>Les compte suivant a été enregistré : </h3>
                    <p>
                        <?php
                        ?>
                    </p>
                    <p>
                    <a href="./classesetpdo.php"><button class="btn btn-outline-secondary btn-small" type="button">Retour à la page des comptes</button></a>
                    </p>
                        <form method="post">
                            <fieldset class="form-control my-2">
                                <legend>
                                    Détenteur du compte
                                </legend>
                                <div class="row my-2">
                                    <div class="col-lg-6">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" name="nom" id="nom" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control" name="prenom" id="nom" />
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-control my-2">
                                <legend>Agence</legend>
                                <div class="row my-2">
                                    <div class="col-lg-6">
                                        <label for="numagence">Numéro d'agence</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="numagence" id="numagence" />
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-control my-2">
                                <legend>
                                    Détails du compte
                                </legend>
                                <div class="row my-2">
                                    <div class="col-lg-6">
                                        <label for="type">Numéro d'agence</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="type" id="type" value="<?php echo $_GET['typecompte'] ?>" readonly />
                                    </div>
                                </div>
                                        <div class="row my-2">
                                            <div class="col-lg-6">
                                                <label for="numcarte">Numéro de carte</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" readonly class="form-control" name="numcarte" id="numcarte" value="<?php echo $numcarte ?>" />
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-lg-6">
                                                <label for="codepin">Code secret</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" readonly class="form-control" name="codepin" id="codepin" value="<?php echo $codepin ?>" />
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-lg-6">
                                                <label for="taux">Taux d'intérêts</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="form-select" name="taux" id="taux">
                                                    <option selected>Choisir le taux d'intéret</option>
                                                    <option value="0.015">1.5%</option>
                                                    <option value="0.03">3%</option>
                                                    <option value="0.05">5%</option>
                                                </select>
                                            </div>
                                        </div>
                                ?>
                                <div class="row my-2">
                                    <div class="col-lg-6">
                                        <label for="solde">Solde</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" name="solde" id="solde" />
                                    </div>
                                </div>
                            </fieldset>
                            <p>
                                <button class="btn btn-outline-success btn-small" type="submit">
                                    Créer et enregistrer le compte
                                </button>
                                <button class="btn btn-outline-warning btn-small" type="reset">
                                    Vider le formulaire
                                </button>
                                <a href="./classesetpdo.php"><button class="btn btn-outline-secondary btn-small" type="button">Annuler</button></a>
                            </p>
                        </form>
                        <p>
                            Oups !<br />
                            <a href="./classesetpdo.php">Revenir en arrière</a>
                        </p>
            </article>

        </section>
    </main>
    <?php
    include './src/includes/footer.php';
    ?>
</body>

</html>