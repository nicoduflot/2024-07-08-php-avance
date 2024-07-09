<?php
require_once './vendor/autoload.php';
use Utils\Tools;
use Doctrine\Common\Collections\ArrayCollection;
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
            <article>
                <header>
                    <h2>PDO</h2>
                </header>
                <h3>Principes</h3>
                <p>
                    PDO ou "Php Data Object" est un moyen de se connecter à une base de données et un moyen
                    de manipuler cette bdd. Son avantage tiens dans le fait qu'on utilise les mêmes méthodes pour
                    manipuler des bases de données différentes (MySql, PostGre, Oracle, etc.).
                </p>
                <h2>Connexion avec PDO</h2>
                <p>
                    Il faut pour se connecter :
                </p>
                <ul>
                    <li>L'hôte</li>
                    <li>le nom de la bdd</li>
                    <li>le charset utilisé dans la bdd</li>
                    <li>identifiant utilisateur bdd</li>
                    <li>mot de passe utilisateur bdd</li>
                </ul>
                <p>
                    new PDO("mysql:host=&lsaquo;nom de l'hôte&rsaquo;;dbname=&lsaquo;nom bdd&rsaquo;;
                    charset=&lsaquo;jeu de caractère bdd&rsaquo;", "&lsaquo;nom de l'utilisateur&rsaquo;",
                    "&lsaquo;mdp utilisateur&rsaquo;");
                </p>
                <code>
                    //exemple<br />
                    $bdd = new PDO("mysql:host=localhost;dbname=026-php-inter-poo;charset=UTF8", "root", "");
                </code>
                <h3>Tester la connexion</h3>
                <?php
                try{
                    $bdd = new PDO('mysql:host=localhost;dbname=2024-07-08-php-avance;charset=UTF8', 'root', '', array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
                    echo '<p>La connexion fonctionne.</p>';
                    Tools::prePrint($bdd);
                }
                catch(Exception $e){
                    die('Erreur de connexion : ' . $e->getMessage());
                }
                ?>
            </article>
            <article>
                <header>
                    <h2>Requêter avec PDO</h2>
                </header>
                <p>
                    On peut utiliser la méthode query
                </p>
                <code>
                    $response = $bdd->query("SELECT * FROM `jeux_video`");
                </code>
                <?php
                $response = $bdd->query("SELECT * FROM `jeux_video`");
                Tools::prePrint($response);
                ?>
                <p>
                    $response contient désormais le jeu d'enregistrements récupéré via la requête.
                    On ne peut pas exploiter $response directement, il va falloir utliser les méthodes
                    de PDO désormais utilisables avec $response.
                </p>
                <code>
                    $unEnregistrement = $response->fetch(PDO::FETCH_ASSOC);<br />
                    print_r($unEnregistrement);<br />
                    $unEnregistrement = $response->fetch(PDO::FETCH_ASSOC);<br />
                    print_r($unEnregistrement);<br />
                </code>
                <?php
                $unEnregistrement = $response->fetch(PDO::FETCH_ASSOC);
                Tools::prePrint($unEnregistrement);
                Tools::prePrint($unEnregistrement['nom']);
                $unEnregistrement = $response->fetch(PDO::FETCH_BOTH);
                Tools::prePrint($unEnregistrement);
                Tools::prePrint($unEnregistrement['nom']);
                Tools::prePrint($unEnregistrement[1]);
                $unEnregistrement = $response->fetch(PDO::FETCH_NUM);
                Tools::prePrint($unEnregistrement);
                Tools::prePrint($unEnregistrement[1]);
                ?>
                <p>
                    fetch() renvoie l'enregistrement actuel où se trouve le curseur dans le jeu d'enregistrement.
                    Une fois qu'il a renvoyé les données, le curseur passe à l'enregistrement suivant.
                </p>
                <p>
                    Il faut, une fois qu'on a finit d'utiliser les données, "fermer" le curseur.
                </p>
                <code>
                    $response->closeCursor();
                </code>
                <?php
                $response->closeCursor();
                $unEnregistrement = $response->fetch(PDO::FETCH_ASSOC);
                Tools::prePrint($unEnregistrement);
                Tools::prePrint($response);
                ?>
            </article>
            <article>
                <header>
                    <h2>Exploiter les résultats</h2>
                </header>
                <p>
                    Maintenant, on relance la requête et on va afficher les résultats
                    dans un tableau généré par une boucle
                </p>
                <?php
                $response = $bdd->query("SELECT * FROM `jeux_video` ORDER BY `ID` DESC");
                ?>
                <div class="table-responsive" style="height: 300px;">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Jeu</th>
                                <th>Possesseur</th>
                                <th>Prix</th>
                                <th>Console</th>
                                <th>nb joueurs max</th>
                                <th>Commentaire(s)</th>
                                <th>Action(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($donnees = $response->fetch(PDO::FETCH_ASSOC)){
                            ?>
                                <tr>
                                    <td><?php echo $donnees['nom'] ?></td>
                                    <td><?php echo $donnees['possesseur'] ?></td>
                                    <td><?php echo $donnees['prix'] ?></td>
                                    <td><?php echo $donnees['console'] ?></td>
                                    <td><?php echo $donnees['nbre_joueurs_max'] ?></td>
                                    <td><?php echo $donnees['commentaires'] ?></td>
                                    <td style="width: 250px;">
                                        <a href="./actionJV.php?action=mod&idJV=<?php echo $donnees['ID'] ?>"><button class="btn btn-primary">Modifier</button></a> 
                                        <a href="./actionJV.php?action=sup&idJV=<?php echo $donnees['ID'] ?>"><button class="btn btn-danger">Supprimer</button></a>
                                    </td>
                                </tr>
                            <?php
                            
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                $response->closeCursor();
                ?>
            </article>
            <article class="col-lg-6">
                <header>
                    <h2>Les requêtes préparées</h2>
                </header>
                <p>
                    Si on veut pouvoir choisir des paramètres pour la recherche (comme des filtres), il faut utiliser
                    les méthodes PDO de préparation de requête.
                </p>
                <form>
                    <fieldset class="form-group my-2">
                        <label for="possesseur" class="form-label">Possesseur</label>
                        <input type="text" class="form-control" name="possesseur" id="possesseur" />
                    </fieldset>
                    <fieldset class="form-group my-2">
                        <label for="prixmax" class="form-label">Prix Maximum</label>
                        <input type="text" class="form-control" name="prixmax" id="prixmax" />
                    </fieldset>
                    <fieldset class="form-group my-2">
                        <label for="console" class="form-label">Console</label>
                        <input type="text" class="form-control" name="console" id="console" />
                    </fieldset>
                    <p class="my-2">
                        <button class="btn btn-outline-primary" name="soumettre" type="submit" value="soumettre">Rechercher</button>
                    </p>
                </form>
                <?php

                if( isset($_GET['soumettre']) && $_GET['soumettre'] === 'soumettre' ){
                    Tools::prePrint($_GET);
                    if( isset($_GET['possesseur']) && $_GET['possesseur'] !== '' ){
                        Tools::prePrint($_GET['possesseur']);
                    }

                    if( isset($_GET['prixmax']) && $_GET['prixmax'] !== '' ){
                        Tools::prePrint($_GET['prixmax']);
                    }
                    
                    if( isset($_GET['console']) && $_GET['console'] !== '' ){
                        Tools::prePrint($_GET['console']);
                    }
                }
                ?>
                <div class="table-responsive" style="height: 300px;">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Jeu</th>
                                <th>Possesseur</th>
                                <th>Prix</th>
                                <th>Console</th>
                                <th>nb joueurs max</th>
                                <th>Commentaire(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </article>
            <article class="col-lg-6">
                <header>
                    <h2>Manipulation des enregistrements</h2>
                </header>
                <h3>Ajoût de données</h3>
                <form method="post">
                    <fieldset class="form-group my-2">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom" />
                    </fieldset>
                    <fieldset class="form-group my-2">
                        <label for="possesseur" class="form-label">Possesseur</label>
                        <input type="text" class="form-control" name="possesseur" id="possesseur" />
                    </fieldset>
                    <fieldset class="form-group my-2">
                        <label for="console" class="form-label">Console</label>
                        <input type="text" class="form-control" name="console" id="console" />
                    </fieldset>
                    <fieldset class="form-group my-2">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="text" class="form-control" name="prix" id="prix" />
                    </fieldset>
                    <fieldset class="form-group my-2">
                        <label for="nbJmax" class="form-label">Nombre de joueurs max</label>
                        <input type="text" class="form-control" name="nbJmax" id="nbJmax" />
                    </fieldset>
                    <fieldset class="form-group my-2">
                        <label for="commentaires" class="form-label">Commentaire</label>
                        <input type="text" class="form-control" name="commentaires" id="commentaires" />
                    </fieldset>
                    <p class="my-2">
                        <button class="btn btn-outline-primary" name="ajoutJeu" type="submit" value="ajoutJeu">Ajouter le jeu</button>
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