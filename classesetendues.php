<?php
require_once './vendor/autoload.php';
use Utils\Tools;
use App\CompteCheque;
use App\CompteInteret;
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
                    <h2>Classes étendues</h2>
                </header>
                <h3>Principes</h3>
                <p>
                    Une classe est étendue quand elle possède une classe fille. La classe fille
                    hérite automatiquement des attributs et des méthodes de la classe mère. L'avantage
                    est que la classe fille peut posséder ses propres méthodes et attributs, mais elle peut aussi
                    surcharger les méthodes de la classe mère en les redéfinissants. Mais si on veut pouvoir redéfinir,
                    par exemple, les getters ou setters de la classe mère, les attributs concernés dans la classe
                    mère doivent être alors déclarés en protected et plus en private.
                </p>
            </article>
        </section>
        <section class="row">
            <article>
                <header>
                    <h2>Création des comptes qui héritent de la classe compte</h2>
                </header>
                <p>
                    On crée un compte chèque et un compte à intérêt.
                </p>
                <h3>Le compte chèque</h3>
                <ul>
                    <li>Possède une carte de paiement</li>
                    <li>Possède une méthode payerparcarte</li>
                </ul>
                <h4>La carte de paiement</h4>
                <ul>
                    <li>Un numéro de carte</li>
                    <li>Un PIN</li>
                </ul>
                <h3>Le compte intérêts</h3>
                <ul>
                    <li>Possède un taux d'intérêt</li>
                    <li>Possède une méthode crediterinterets</li>
                    <li>Le virement ne permet pas de rendre débiteur le compteinteret</li>
                </ul>
            </article>
            <article class="col-lg-6">
                <header>
                    <h2>Compte Chèque</h2>
                </header>
                <?php
                /* ici on testera le compte chèque */
                $comptecheque = new CompteCheque('Duflot', 'Nicolas', 'CCP-987654', '0123456', 'MON RIB', 'MON IBAN FR', '1236 4569 7854 9654', '0123', 2500, 400);
                Tools::prePrint($comptecheque);
                $comptechequeAcme = new CompteCheque('ACME', '', 'CCP-78954', '9876541', 'ACME RIB', 'ACME IBAN US', '9874 6541 3210 7854', '9874', 1000000, 40000);
                Tools::prePrint($comptechequeAcme);
                $comptecheque->virement(250, $comptechequeAcme);
                echo $comptecheque->ficheCompte();
                /*
                $carteCompteCheque = $comptecheque->getCarte();
                Tools::prePrint($carteCompteCheque);
                */
                Tools::prePrint($comptecheque->getCarte());
                Tools::prePrint($comptecheque->getCarte()->getCodepin());
                Tools::prePrint($comptecheque->getCarte()->getNumcarte());
                ?>
            </article>
            <article class="col-lg-6">
                <header>
                    <h2>Compte Intéret</h2>
                </header>
                <?php
                /* ici on testera le compte intérêts */
                $compteinteret = new CompteInteret('Duflot', 'Nicolas', 'CCP-987654', '0123456', 'MON RIB', 'MON IBAN FR', 2500, 'e0.015', 400);
                Tools::prePrint($compteinteret);
                Tools::prePrint($compteinteret->crediterinterets());
                ?>
                <div>
                    <?php
                    echo $compteinteret->ficheCompte();
                    ?>
                </div>
            </article>
        </section>
        <section>
            <article>
                <header>
                    <h2>Surcharger une propriété ou une méthode</h2>
                </header>
                <h3>L'opérateur de résolution de portée</h3>
                <p>
                    On peut déclarer dans une classe mère, un attribut ou une méthode qui devrat être surchargée dans une classe fille. 
                    Par exemple, la méthode de la classe fille fait exactement ce que fait la méthode de la classe mère mais elle modifie peut-être un attribut propre à la classe fille. Dans la déclaration de la méthode surchargée de la classe fille, il faut tout d'abord récupérer la méthode de la classe mère en utilisant l'opérateur de résolution de portée, <code>::</code> précédé d'un des mots clefs suivant : parent, self ou static.
                </p>
                <p>
                    Dans le cas présent, c'est le mot parent qui nous intéressera. on écrira alors dans la déclaration de la méthode surchargée par la lasse fille : 
                </p>
                <code>
                    <pre>
public function methodeParente(){
    parent::methodeParente(); 
    $this->attributEnfant = true;
}
                    </pre>
                </code>
                <h3>L'opérateur de résolution de portée et les constantes</h3>
                <p>
                    Certains attribut dans une classe peuvent être une constante
                </p>
                <p>
                    Constante : <br />
                    Une constante est une variable qui ne stockera qu'une et unique valeur.
                </p>
                <p>
                    Part défaut (si rien n'est précisé) une constante déclarée dans une classe sera publique dans une classe.<br />
                    Pour définir une constante dans une classe par exemple :
                </p>
                <code>
                    <pre>
public const MACONSTANTE = 25;
                    </pre>
                </code>
                <p>
                    Pour accéder à une constante dans la classe où elle a été créé, on utilise l'opérateur de portée avec le mot clef self
                </p>
                <code>
                    <pre>
$varDansMethode = self::MACONSTANTE / 5;
                    </pre>
                </code>
                <p>
                    Pour accéder à une constante dans la classe parente, on utilise l'opérateur de portée avec le mot clef parent
                </p>
                <code>
                    <pre>
$varDansMethode = parent::MACONSTANTE / 2.5;
                    </pre>
                </code>
                <p>
                    Il est aussi possible de surcharger la constante dans la classe fille, et à l'aide de l'opérateur de portée, décider dans les méthodes de la classe fille de prendre l'originale (celle de la classe mère) avec parent:: ou celle surchargée par la fille avec self::
                </p>
                <p>
                    Par exemple :
                </p>
                <code>
                    <pre>
class Mere{

    publique const MACONSTANTE = 25;

    publique function __construct(){

    }

    publique function methode(){
        $maVarDansMethode = self::MACONSTANTE / 4;
        /* 25 / 5 =  5 */
        return $maVarDansMethode;
    }
}

class Enfant extends Mere{
    publique const MACONSTANTE = 20;
    private $isItTrue = false;

    publique function __construct(){

    }

    public function getIsItTrue(){
        return this->isItTrue;
    }

    publique function methode(){
        if($this->getIsItTrue()){
            $maVarDansMethode = self::MACONSTANTE / 5;
            /* 20 / 5 = 4 */
        }else{
            $maVarDansMethode = parent::MACONSTANTE / 2.5;
            /* 25 / 2.5 = 10 */
        }
        return $maVarDansMethode;
    }
}
                    </pre>
                </code>
                <p>
                    On peut dans le code hors classe accéder directement à la valeur de la constante pour chaque classe.
                </p>
                <code>
                    <pre>
echo Mere::MACONSTANTE;
/* Affiche 25 */
$classe = 'Mere';
echo $classe::MACONSTANTE;
/* Affiche 25 */

echo Enfant::MACONSTANTE;
/* Affiche 20 */
                    </pre>
                </code>
            </article>
        </section>
        <section>
            <article>
                <header>
                    <h2>
                        Les Propriétés et méthodes statiques
                    </h2>
                </header>
                <p>
                    Les propriétés ou méthodes statiques sont des propriétés ou méthodes qui ne s'utilisent pas à partir de l'instance d'une classe mais qui appartiennent à la classe dans laquelle elles sont définies.
                </p>
                <p>
                    Elles auront la même définition et la même valeur pour toutes les instance de la classe et on peux y accéder sans instancier la classe.
                </p>
                <p>
                    On ne peut pas accéder à une propriété statique depuis un objet. Une propriété statique peut, au contrainte d'une constante de classe, changer de valeur au cours du temps.
                </p>
                <p>
                    Par exemple : 
                </p>
                <code>
                    <pre>
class Enfant extends Mere{
    protected static $coffreAJouets
    __construct(){

    }

    public function ajoutJouet($jouet){
        self::$coffreAJouets[] = $jouet;
    }

    public function contenuCoffre(){
        foreach(self::$coffreAJouets as $jouet){
            echo $jouet.', ';
        }
    }

}                        
                    </pre>
                </code>
                <p>
                    Utilisé dans le code suivant :
                </p>
                <code>
                    <pre>
$soeur = new Enfant();
$frere = new Enfant();
$soeur->ajoutJouet('Buzz l\'Éclair');
$frere->ajoutJouet('X-wing lego');
$soeur->contenuCoffre();
/* affiche Buzz l'éclair, X-wing lego */
$frere->contenuCoffre();
/* affiche Buzz l'éclair, X-wing lego */
                    </pre>
                </code>
            </article>
        </section>
        <section>
            <article>
                <header>
                    <h2>
                        Les classes et méthodes abstraites
                    </h2>
                </header>
                <p>
                    Dans l'exemple des comptes, on laisse la possibilité de créer un compte simple (classe mère de compte à intérêt et compte chèque)
                </p>
                <p>
                    Normalement, on ne peut que créer des comptes à intérêts ou des comptes chèques, donc la classe mère Compte devrait être une classe abstraite, définissant tous les attributs et toutes les méthodes communes aux classes filles, et seulement dans les classes filles on définit les méthodes qui sont différentes.
                </p>
            </article>
        </section>
        <section class="row">
            <article>
                <header>
                    <h2>Les interfaces</h2>
                </header>
                <p>
                    Les interfaces répondent au problème suivants : une classe mère radio ayant tous les attributs et les méthodes communes à une radio FM, une radio cassette, une radio cd et une radio cassette et cd.
                </p>
                <p>
                    Quatre classes filles : radio FM, Radio cassette, radio cd et radio cassette cd.
                </p>
                <p>
                    Plutôt que de créer toutes les options dans la classe mère, les classe filles vont implémenter des interfaces différentes correspondant à la fm, la cassette, et le cd.
                </p>
                <ul>
                    <li>une classe mère Radio.</li>
                    <li>une classe fille radio FM qui étends radio et qui implémente l'interface FM</li>
                    <li>une classe fille radio cassette qui étends radio et qui implémente l'interface FM et l'interface cassette</li>
                    <li>une classe fille radio cd qui étends radio et qui implémente l'interface FM et l'interface cd</li>
                    <li>une classe fille radio cassette cd qui étends radio et qui implémente l'interface FM , linterface casset et l'interface cd</li>
                </ul>
                <p>
                    Attention, les interfaces ne peuvent que définir que la signature d'une méthode, pas sont implémentation.
                </p>
                <p>
                    Donc les méthodes déclarées dans l'interface devront être publiques (elles sont implémentées en dehors de l'interface) et les constantes de l'interface ne pourront pas être écrasées par la classe qui en hérite.
                </p>
                <!--
                Interface : 
                https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/oriente-objet-interface/
                Interface et factory :
                https://medrhamnia.wordpress.com/2015/07/10/php-comprendre-le-design-pattern-factory/
                -->
            </article>
            <article>
                <header>
                    <h2>Créer l'interface</h2>
                </header>
                <p>
                    On utilise le mot <code>interface</code> à la place du mot <code>class</code>
                </p>
                <p>
                    <code>
                        &lt;?php<br />
                        interface Utrain{<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public const PRIXABO = 15;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public function getNomUtilisateur();<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public function setPrixAbo();<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public function getPrixAbo();<br />
                        }
                    </code>
                </p>
                <p>
                    Dans les personnes qui prennent des abonnements, il y a des personne qui travaillent à U-train. Certains seront Cadre et paieront moins chers que les non cadres.
                    Les personnes du public, si elles font parties de la police elle paieront moins chers que le public.
                </p>
            </article>
            <article class="col-lg-6">
                <header>
                    <h2>Le public</h2>
                </header>
                <p>
                    Les personnes ne travaillant pas pour UTrain
                </p>
                <p>
                    <code>
                        &lt;?php<br />
                        class PublicUser implements Utrain{<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;protected $nomUtilisateur;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;protected $statut;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;protected $prixAbo;<br />
                        <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public function __construct($nom, $statut = ''){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->nomUtilisateur = $nom;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->statut = $statut;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public function getNomUtilisateur(){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo $this->nomUtilisateur;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public function getPrixAbo(){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo $this->prixAbo;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;public function setPrixAbo(){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this->statut === 'Police'){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return $this->prixAbo = Utrain::PRIXABO / 2;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}else{<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return $this->prixAbo = Utrain::PRIXABO;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        }<br />
                    </code>
                </p>
                <?php

                ?>
            </article>
            <article class="col-lg-6">
                <header>
                    <h2>Les salariés de Utrain</h2>
                </header>
                <p>
                    Les gens qui travaillent à Utrain.
                </p>
                <p>
                    <code>
                        &lt;?php<br />
                        class InternUser implements Utrain{<br />
                        &nbsp;&nbsp;&nbsp;protected $nomUtilisateur;<br />
                        &nbsp;&nbsp;&nbsp;protected $statut;<br />
                        &nbsp;&nbsp;&nbsp;protected $prixAbo;<br />
                        <br />
                        &nbsp;&nbsp;&nbsp;public function __construct($nom, $statut = ''){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->nomUtilisateur = $nom;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->statut = $statut;<br />
                        &nbsp;&nbsp;&nbsp;}<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public function getNomUtilisateur(){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo $this->nomUtilisateur;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public function getPrixAbo(){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo $this->prixAbo;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />

                        &nbsp;&nbsp;&nbsp;&nbsp;public function setPrixAbo(){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this->statut === 'Cadre'){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return $this->prixAbo = Utrain::PRIXABO / 6;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}else{<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return $this->prixAbo = Utrain::PRIXABO / 3;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;public function getWifi(){<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo 'L\'utilisateur du transport a le wifi sans pub';<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        }
                    </code>
                </p>
                <?php

                ?>
            </article>
        </section>
        <section class="row">
            <article>
                <header>
                    <h2>les design pattern Factory</h2>
                </header>
                <!--
                    https://tainix.fr/code/Design-Pattern-en-PHP-Factory
                -->
                <h3>Principe</h3>
                <p>
                    La factory est une "usine à objets".
                </p>
                <p>
                    C'est une classe sans constructeur mais qui possède une méthode statique qui permet de renvoyer des instances d'autres classes.
                </p>
                <p>
                    Par exemple, pour créer un compte de base on fait <code>$compte = new Compte(<param du compte>);</code>
                </p>
                <p>
                    une factory permettrai d'écrire <code>$compte = CompteFactory::creerCompte('Compte', ['clef' => valeurs, ...]);</code>
                </p>
                <p>
                    Pour créer un compte chèque <code>$compte = CompteFactory::creerCompte('CompteCheque',  ['clef' => valeurs, ...]);</code>
                </p>
                <p>
                    Ici, à la création du compte, au lieu d'avoit le détenteur dans l'objet compte, le détenteur serai un objet Detenteur, défini avec une partie des paramètre, et ensuite ajouté au compte.
                </p>
                <p>
                    Exemple suivant vue ici : <a href="https://tainix.fr/code/Design-Pattern-en-PHP-Factory" target="_blank">Tainix</a>
                </p>
                <?php
                ?>
            </article>
        </section>
    </main>
    <?php
    include './src/includes/footer.php';
    ?>
</body>
</html>