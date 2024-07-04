# Classes étendues
## Principes

Une classe est étendue quand elle possède une classe fille. La classe fille hérite automatiquement des attributs et des méthodes de la classe mère. L'avantage est que la classe fille peut posséder ses propres méthodes et attributs, mais elle peut aussi surcharger les méthodes de la classe mère en les redéfinissants. Mais si on veut pouvoir redéfinir, par exemple, les getters ou setters de la classe mère, les attributs concernés dans la classe mère doivent être alors déclarés en protected et plus en private.

## Création des comptes qui héritent de la classe compte

On crée un compte chèque et un compte à intérêt.
### Le compte chèque

- Possède une carte de paiement
- Possède une méthode payerparcarte

### La carte de paiement

- Un numéro de carte
- Un PIN

### Le compte intérêts

- Possède un taux d'intérêt
- Possède une méthode crediterinterets
- Le virement ne permet pas de rendre débiteur le compteinteret


## Compte Chèque
```
D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(App\CompteCheque)[4]
  private 'nom' (App\Compte) => string 'Duflot' (length=6)
  private 'prenom' (App\Compte) => string 'Nicolas' (length=7)
  private 'numcompte' (App\Compte) => string 'CCP 6543231' (length=11)
  private 'numagence' (App\Compte) => string 'AG 9874' (length=7)
  private 'rib' (App\Compte) => string 'RIB 456987' (length=10)
  private 'iban' (App\Compte) => string 'IBAN 987321' (length=11)
  private 'solde' (App\Compte) => int 1500
  private 'devise' (App\Compte) => string '€' (length=3)
  private 'uniqueid' (App\Compte) => null
  private 'carte' => 
    object(App\Carte)[2]
      private 'numcarte' => string '2111 1098 765 4321' (length=18)
      private 'codepin' => string '3210' (length=4)

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(App\CompteCheque)[5]
  private 'nom' (App\Compte) => string 'ACME' (length=4)
  private 'prenom' (App\Compte) => string '' (length=0)
  private 'numcompte' (App\Compte) => string 'CCP 987654' (length=10)
  private 'numagence' (App\Compte) => string 'AG 01234' (length=8)
  private 'rib' (App\Compte) => string 'RIB 789456' (length=10)
  private 'iban' (App\Compte) => string 'IBAN 456123' (length=11)
  private 'solde' (App\Compte) => int 1500
  private 'devise' (App\Compte) => string '€' (length=3)
  private 'uniqueid' (App\Compte) => null
  private 'carte' => 
    object(App\Carte)[6]
      private 'numcarte' => string '0123 4567 8910 1112' (length=19)
      private 'codepin' => string '0123' (length=4)
```
Un paiement de 25€ a été effectué vers le receveur ACME
Compte créditeur : **1450 €**
```
D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:float 1450

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:float 1525
```

## Compte Intéret
```
D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(App\CompteInteret)[7]
  private 'nom' (App\Compte) => string 'Duflot' (length=6)
  private 'prenom' (App\Compte) => string 'Nicolas' (length=7)
  private 'numcompte' (App\Compte) => string 'CCP 6543231' (length=11)
  private 'numagence' (App\Compte) => string 'AG 9874' (length=7)
  private 'rib' (App\Compte) => string 'RIB 456987' (length=10)
  private 'iban' (App\Compte) => string 'IBAN 987321' (length=11)
  private 'solde' (App\Compte) => int 1500
  private 'devise' (App\Compte) => string '€' (length=3)
  private 'uniqueid' (App\Compte) => null
  private 'taux' => float 0.03
```
1487.5
1462.5
Le compte inétrêt à taux 0.03 a été crédité de 44.625 €


# Surcharger une propriété ou une méthode

## L'opérateur de résolution de portée

On peut déclarer dans une classe mère, un attribut ou une méthode qui devrat être surchargée dans une classe fille. Par exemple, la méthode de la classe fille fait exactement ce que fait la méthode de la classe mère mais elle modifie peut-être un attribut propre à la classe fille. Dans la déclaration de la méthode surchargée de la classe fille, il faut tout d'abord récupérer la méthode de la classe mère en utilisant l'opérateur de résolution de portée, :: précédé d'un des mots clefs suivant : parent, self ou static.

Dans le cas présent, c'est le mot parent qui nous intéressera. on écrira alors dans la déclaration de la méthode surchargée par la lasse fille :
```
public function methodeParente(){
    parent::methodeParente(); 
    $this->attributEnfant = true;
}
```                    

## L'opérateur de résolution de portée et les constantes

Certains attribut dans une classe peuvent être une constante

**Constante :**
Une constante est une variable qui ne stockera qu'une et unique valeur.

Part défaut (si rien n'est précisé) une constante déclarée dans une classe sera publique dans une classe.
Pour définir une constante dans une classe par exemple :

```public const MACONSTANTE = 25;```
                    

Pour accéder à une constante dans la classe où elle a été créé, on utilise l'opérateur de portée avec le mot clef self

```$varDansMethode = self::MACONSTANTE / 5;```
                    

Pour accéder à une constante dans la classe parente, on utilise l'opérateur de portée avec le mot clef parent

```$varDansMethode = parent::MACONSTANTE / 2.5;```
                    
Il est aussi possible de surcharger la constante dans la classe fille, et à l'aide de l'opérateur de portée, décider dans les méthodes de la classe fille de prendre l'originale (celle de la classe mère) avec parent:: ou celle surchargée par la fille avec self::

**Par exemple :**
```
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
```

On peut dans le code hors classe accéder directement à la valeur de la constante pour chaque classe.
```
echo Mere::MACONSTANTE;
/* Affiche 25 */
$classe = 'Mere';
echo $classe::MACONSTANTE;
/* Affiche 25 */

echo Enfant::MACONSTANTE;
/* Affiche 20 */
```

# Les Propriétés et méthodes statiques

Les propriétés ou méthodes statiques sont des propriétés ou méthodes qui ne s'utilisent pas à partir de l'instance d'une classe mais qui appartiennent à la classe dans laquelle elles sont définies.

Elles auront la même définition et la même valeur pour toutes les instance de la classe et on peux y accéder sans instancier la classe.

On ne peut pas accéder à une propriété statique depuis un objet. Une propriété statique peut, au contrainte d'une constante de classe, changer de valeur au cours du temps.

**Par exemple :**
```
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
```

**Utilisé dans le code suivant :**

```
$soeur = new Enfant();
$frere = new Enfant();
$soeur->ajoutJouet('Buzz l\'Éclair');
$frere->ajoutJouet('X-wing lego');
$soeur->contenuCoffre();
/* affiche Buzz l'éclair, X-wing lego */
$frere->contenuCoffre();
/* affiche Buzz l'éclair, X-wing lego */
```

# Les classes et méthodes abstraites

Dans l'exemple des comptes, on laisse la possibilité de créer un compte simple (classe mère de compte à intérêt et compte chèque)

Normalement, on ne peut que créer des comptes à intérêts ou des comptes chèques, donc la classe mère Compte devrait être une classe abstraite, définissant tous les attributs et toutes les méthodes communes aux classes filles, et seulement dans les classes filles on définit les méthodes qui sont différentes.

# Les interfaces

Les interfaces répondent au problème suivants : une classe mère radio ayant tous les attributs et les méthodes communes à une radio FM, une radio cassette, une radio cd et une radio cassette et cd.

Quatre classes filles : radio FM, Radio cassette, radio cd et radio cassette cd.

Plutôt que de créer toutes les options dans la classe mère, les classe filles vont implémenter des interfaces différentes correspondant à la fm, la cassette, et le cd.

- une classe mère Radio.
- une classe fille radio FM qui étends radio et qui implémente l'interface FM
- une classe fille radio cassette qui étends radio et qui implémente l'interface FM et l'interface cassette
- une classe fille radio cd qui étends radio et qui implémente l'interface FM et l'interface cd
- une classe fille radio cassette cd qui étends radio et qui implémente l'interface FM , linterface casset et l'interface cd

>Attention, les interfaces ne peuvent que définir la signature d'une méthode, pas son implémentation.

Donc les méthodes déclarées dans l'interface devront être publiques (elles sont implémentées en dehors de l'interface) et les constantes de l'interface ne pourront pas être écrasées par la classe qui en hérite.

## Créer l'interface

On utilise le mot interface à la place du mot class
```
<?php
interface Utrain{
    public const PRIXABO = 15;
    public function getNomUtilisateur();
    public function setPrixAbo();
    public function getPrixAbo();
}
```
Dans les personnes qui prennent des abonnements, il y a des personne qui travaillent à U-train. Certains seront Cadre et paieront moins chers que les non cadres. Les personnes du public, si elles font parties de la police elle paieront moins chers que le public.


### Le public

**Les personnes ne travaillant pas pour UTrain**

```
<?php
class PublicUser implements Utrain{
    protected $nomUtilisateur;
    protected $statut;
    protected $prixAbo;

    public function __construct($nom, $statut = ''){
        $this->nomUtilisateur = $nom;
        $this->statut = $statut;
    }
    public function getNomUtilisateur(){
        echo $this->nomUtilisateur;
    }
    public function getPrixAbo(){
        echo $this->prixAbo;
    }
    public function setPrixAbo(){
        if($this->statut === 'Police'){
            return $this->prixAbo = Utrain::PRIXABO / 2;
        }else{
            return $this->prixAbo = Utrain::PRIXABO;
        }
    }
}

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Utrain\PublicUser)[8]
  protected 'nomUtilisateur' => string 'Karl Odenmayer' (length=14)
  protected 'statut' => string '' (length=0)
  protected 'prixAbo' => int 15

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Utrain\PublicUser)[9]
  protected 'nomUtilisateur' => string 'Nicolas Sarkosy' (length=15)
  protected 'statut' => string 'Police' (length=6)
  protected 'prixAbo' => float 7.5
```


## Les salariés de Utrain

**Les gens qui travaillent à Utrain.**
```
<?php
class InternUser implements Utrain{
   protected $nomUtilisateur;
   protected $statut;
   protected $prixAbo;

   public function __construct($nom, $statut = ''){
        $this->nomUtilisateur = $nom;
        $this->statut = $statut;
   }
    public function getNomUtilisateur(){
        echo $this->nomUtilisateur;
    }
    public function getPrixAbo(){
        echo $this->prixAbo;
    }
    public function setPrixAbo(){
        if($this->statut === 'Cadre'){
            return $this->prixAbo = Utrain::PRIXABO / 6;
        }else{
            return $this->prixAbo = Utrain::PRIXABO / 3;
        }
    }

    public function getWifi(){
        echo 'L\'utilisateur du transport a le wifi sans pub';
    }
}

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Utrain\InternUser)[10]
  protected 'nomUtilisateur' => string 'Michel Marc' (length=11)
  protected 'statut' => string 'Cadre' (length=5)
  protected 'prixAbo' => float 2.5

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Utrain\InternUser)[11]
  protected 'nomUtilisateur' => string 'Jean Christophe Ballain' (length=23)
  protected 'statut' => string '' (length=0)
  protected 'prixAbo' => int 5
```

# le design pattern Factory

## Principe

La factory est une "usine à objets".

C'est une classe sans constructeur mais qui possède une méthode statique qui permet de renvoyer des instances d'autres classes.

Par exemple, pour créer un compte de base on fait $compte = new Compte();

une factory permettrai d'écrire $compte = CompteFactory::creerCompte('Compte', ['clef' => valeurs, ...]);

Pour créer un compte chèque $compte = CompteFactory::creerCompte('CompteCheque', ['clef' => valeurs, ...]);

Ici, à la création du compte, au lieu d'avoit le détenteur dans l'objet compte, le détenteur serai un objet Detenteur, défini avec une partie des paramètre, et ensuite ajouté au compte.

Exemple suivant vue ici : [Tainix](https://tainix.fr/code/Design-Pattern-en-PHP-Factory)
```
D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Wargame\Commandant)[12]
  private array 'composition' => 
    array (size=2)
      'Dragons' => int 3
      'Cavaliers' => int 23
  private int 'army' => int 24000

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
array (size=2)
  'Dragons' => int 3
  'Cavaliers' => int 23
```