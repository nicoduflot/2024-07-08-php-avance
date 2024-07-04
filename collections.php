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
                    <h2>Collections</h2>
                </header>
                <h3>Principes</h3>
                <p>
                    Les collections permettent de créer des collections de tableaux
                </p>
                <code>
                    $collection = new ArrayCollection();<br />
                    $collection->add("Nicolas Duflot");
                </code>
                <p>
                    La doc complète de ArrayCollection se trouve <a href="https://www.doctrine-project.org/projects/doctrine-collections/en/stable/index.html" target="_blank">Ici</a>
                </p>
            </article>
        </section>
    </main>
    <?php
    include './src/includes/footer.php';
    ?>
</body>
</html>