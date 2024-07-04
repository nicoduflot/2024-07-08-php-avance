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
        <section>
            <article>
                <header>
                    <h2>Mediathèque</h2>
                </header>
                <h3>Définition d'une oeuvre</h3>
                <p>
                    Une oeuvre peut être définie par :
                </p>
                <ul>
                    <li>Un ou des créateurs</li>
                    <li>Un titre</li>
                    <li>Une description ou un résumé</li>
                </ul>
                <p>
                    Toutes les oeuvres auront les méthodes suivantes
                </p>
                <ul>
                    <li>ajoutcreateur</li>
                    <li>supprcreateur</li>
                </ul>
                <p>
                    Les différents types d'oeuvres seront des classe enfants étandants la classe oeuvre mais ayant chacunes leurs particularités.
                </p>
                <h3>La classe Oeuvre</h3>
            </article>
        </section>
        <section class="row">
            <article class="col-lg-6">
                <header>
                    <h2>L'objet Livre, un type d'oeuvre</h2>
                </header>
                <p>
                    Livre est une classe enfant d'Oeuvre. Livre aura les attribut supplémentaires suivants
                </p>
                <ul>
                    <li>résumé</li>
                    <li>format</li>
                    <li>genre</li>
                    <li>isbn</li>
                </ul>
            </article>
            <article class="col-lg-6">
                <header>
                    <h2>L'objet Film, un type d'oeuvre</h2>
                </header>
                <p>
                    Film est une classe enfant d'Oeuvre. 
                    Film aura les attributs supplémentaires suivants
                </p>
                <ul>
                    <li>Casting (tableau de Role)</li>
                    <li>synopsis</li>
                    <li>support</li>
                    <li>genre</li>
                </ul>
                <p>
                    Et des méthodes de gestion du casting
                </p>
                <ul>
                    <li>ajouter acteur - personnage casting</li>
                    <li>retirer acteur - personnage casting</li>
                </ul>
            </article>
            <article class="col-lg-6">
                <header>
                    <h2>L'objet Périodique, un type d'oeuvre</h2>
                </header>
                <p>
                    Periodique est une classe enfant d'Oeuvre. 
                    Periodique aura les attributs supplémentaires suivants
                </p>
                <ul>
                    <li>Intervenants (tableau de Role)</li>
                    <li>periodicite</li>
                    <li>theme</li>
                </ul>
                <p>
                    Et des méthodes de gestion du casting
                </p>
                <ul>
                    <li>ajouter intervenant - role staff</li>
                    <li>retirer intervenant - rolle staff</li>
                </ul>
            </article>
        </section>
    </main>
    <?php
    include './src/includes/footer.php';
    ?>
</body>
</html>