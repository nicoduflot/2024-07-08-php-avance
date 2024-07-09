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
                <?php
                /*
                Pour utiliser les collections, il faut créer une instance de la classe Arraycollection
                si on ne précise pas le use, 
                $collection = new Doctrine\Common\Collections\ArrayCollection();
                */
                /* Création de l'objet collection */
                $collection = new ArrayCollection();
                Tools::prePrint($collection);
                /* on ajoute des éléments à la collection avec la méthode add() */
                Tools::prePrint($collection);
                $collection->add('Nicolas Duflot');
                $collection->add('Bernie Sanders');
                $collection->add('Fred Flintstone');
                Tools::prePrint($collection);
                /* supprimer un élément de la collection */
                $collection->remove(2);
                Tools::prePrint($collection);
                $collection->removeElement('Nicolas Duflot');
                Tools::prePrint($collection);
                $collection->add('Nicolas Duflot');
                $collection->add('Fred Flintstone');
                /* ajouter un élément avec une clef spécifique */
                $recherche = $collection->contains('Nicolas Duflot');
                Tools::prePrint($recherche);
                $collection->set('Jeu', 'Fallout 4');
                Tools::prePrint($collection);
                $recherche = $collection->contains('Momo');
                Tools::prePrint($recherche);
                Tools::prePrint($collection->count());
                Tools::prePrint($collection->get('Jeu'));
                $collection->set('Jeu', 'Fallout');
                Tools::prePrint($collection);
                Tools::prePrint($collection->current());
                $collection->next();
                Tools::prePrint($collection->current());
                $collection->next();
                Tools::prePrint($collection->current());
                $collection->first();
                Tools::prePrint($collection->current());
                $collection->last();
                Tools::prePrint($collection->current());
                $collection->first();
                for($i = 0; $i < $collection->count(); $i = $i + 1){
                    print_r($collection->get($collection->key()));
                    echo '; ';
                    $collection->next();
                }

                Tools::prePrint($collection->current());
                $mappedCollection = $collection->map(function($element){
                    Tools::prePrint($element);
                    return $element.' toto';
                });
                Tools::prePrint($mappedCollection);
                Tools::prePrint($collection);

                $collection2 = new ArrayCollection([1, 2, 3]);
                Tools::prePrint($collection2);

                $mappedCollection2 = $collection2->map(function($value) {
                    return $value + 1;
                }); // [2, 3, 4]

                Tools::prePrint($mappedCollection2);

                $numberlist = new ArrayCollection([1,2,3,4,5,6,7,8,9]);
                Tools::prePrint($numberlist);

                $numberOverThree = $numberlist->filter(function($element){
                    return $element > 3;
                });

                Tools::prePrint($numberOverThree);

                $pairList = $numberlist->filter(function($element){
                    if($element % 2 === 0){
                        return $element;
                    }
                });
                
                Tools::prePrint($pairList);

                $partition = $numberlist->partition(function($key, $element){
                    if($element % 3 === 0){
                        return $element;
                    }
                });

                Tools::prePrint($partition);
                Tools::prePrint($partition[0]);
                Tools::prePrint($partition[1]);

                $tab1 = [1, 2, 3, 8];
                $tab2 = [8, 9, 10];

                $merge = array_merge($tab1, $tab2);

                $merge = array_unique($merge);

                //$merge = array_values($merge);

                Tools::prePrint($merge);

                $tabAsso = [
                    1 => 'Nicolas Duflot',
                    2 => 'toto',
                    'Marou' => 'minou'
                ];

                Tools::prePrint($tabAsso);

                $tabAssoCollec = new ArrayCollection($tabAsso);

                Tools::prePrint($tabAssoCollec);
                
                $tabAssoCollec = new ArrayCollection($merge);
                Tools::prePrint($tabAssoCollec);
                
                $toto = $tabAssoCollec->toArray();
                tools::prePrint($toto);
                
                $toto = array_values($toto);
                
                $tabAssoCollec = new ArrayCollection($toto);
                Tools::prePrint($tabAssoCollec);

                $tabTest1 = [1, 2, 3, 4];
                $tabTest2 =['titi' => 1, 2, 3, 4];

                Tools::prePrint($tabTest1);
                Tools::prePrint($tabTest2);
                
                $tabRecap = array_merge($tabTest1, $tabTest2);
                Tools::prePrint($tabRecap);
                
                $tabRecap = array_values($tabRecap);
                Tools::prePrint($tabRecap);
                

                ?>
            </article>
        </section>
    </main>
    <?php
    include './src/includes/footer.php';
    ?>
</body>
</html>