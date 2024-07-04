# Principes de la POO
Un objet est la réprésentation de quelque chose de matériel ou non à laquelle on associe des propriétés et des actions.

Une voiture, un compte bancaire, un personnage, etc peuvent être définis en tant qu'objets.

Un objet est défini par des attributs et des méthodes.

## Attribut
Les attributs sont des éléments ou caractères propres à l'objet.

Un compte bancaire, aura par exemple :

- La civilité nom, prénom du détenteur
- le solde
- le numéro d'agence
- Le rib
- l'iban

## Les méthodes
Les actions ou capacités applicable à l'objet.

Le compte bancaire de base aura comme méthodes :

- Modifier le solde
- Effectuer un virement vers un autre objet de type compte
- Info sur le compte

## Instance
Un objet est une instance d'une classe. La classe défini l'objet, ses attributs et ses méthodes ainsi qu'un constructeur. C'est le constructeur qui gère la création de l'objet final.

## Encapsulation
Les attributs et les méthodes de l'objet sont donc encapsulés dans la classe. L'utilisateur de l'objet ne doit pas modifier le code de la classe mais utilisera l'objet via ses méthodes. En général il n'utilise pas directement ses attributs, ils seront privés

## Créer la classe Compte
On crée les attributs en privé

On crée ensuite le constructor

Le constructeur sert a contruire l'objet lors de son instantiation. Il peut contenir du code et il définit les variables a renseigner lors de l'instanciation.

Comme les attributs sont privés, il faut, pour pouvoir les lire et / ou les modifier, créer des méthodes particulières, nommées getter ( ou Assesseur, pour les lire) et setter (ou Mutateur, pour les modifier).

```
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:
object(App\Compte)[1]
  private 'nom' => string 'Duflot' (length=6)
  private 'prenom' => string 'Nico' (length=4)
  private 'numcompte' => string 'CCP-987654' (length=10)
  private 'numagence' => string '0123456' (length=7)
  private 'rib' => string 'MON RIB' (length=7)
  private 'iban' => string 'MON IBAN FR' (length=11)
  private 'solde' => int 2500
  private 'devise' => string '€' (length=3)
  private 'uniqueid' => null
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:string 'Duflot' (length=6)
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:
object(App\Compte)[1]
  private 'nom' => string 'Duflot' (length=6)
  private 'prenom' => string 'Nicolas' (length=7)
  private 'numcompte' => string 'CCP-987654' (length=10)
  private 'numagence' => string '0123456' (length=7)
  private 'rib' => string 'MON RIB' (length=7)
  private 'iban' => string 'MON IBAN FR' (length=11)
  private 'solde' => int 2500
  private 'devise' => string '€' (length=3)
  private 'uniqueid' => null
  ```

**Compte**
**Duflot Nicolas**
Agence n°**0123456**
RIB : **MON RIB**
IBAN : **MON IBAN FR**
Compte : créditeur **2500 €**

```
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:
object(App\Compte)[2]
  private 'nom' => string 'Dusse' (length=5)
  private 'prenom' => string 'Jean-claude' (length=11)
  private 'numcompte' => string 'CCP-654321' (length=10)
  private 'numagence' => string '987654' (length=6)
  private 'rib' => string 'RIB' (length=3)
  private 'iban' => string 'IBAN' (length=4)
  private 'solde' => int 1500
  private 'devise' => string '€' (length=3)
  private 'uniqueid' => null
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:
object(App\Compte)[2]
  private 'nom' => string 'Dusse' (length=5)
  private 'prenom' => string 'Jean-claude' (length=11)
  private 'numcompte' => string 'CCP-654321' (length=10)
  private 'numagence' => string '987654' (length=6)
  private 'rib' => string 'RIB' (length=3)
  private 'iban' => string 'IBAN' (length=4)
  private 'solde' => float 1525
  private 'devise' => string '€' (length=3)
  private 'uniqueid' => null
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:string 'Compte' (length=6)
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:
array (size=9)
  'nom' => string 'Duflot' (length=6)
  'prenom' => string 'Nicolas' (length=7)
  'numcompte' => string 'CCP-987654' (length=10)
  'numagence' => string '0123456' (length=7)
  'rib' => string 'MON RIB' (length=7)
  'iban' => string 'MON IBAN FR' (length=11)
  'solde' => float 2475
  'devise' => string '€' (length=3)
  'uniqueid' => null
  ```

## Les classes statiques
Se sont des classes, généralement sans constructeur, qui contiennent une série de méthodes que l'on peut invoquer sans avoir besoin de créer une instance de la classe.

Il est d'ailleurs IMPOSSIBLE de créer une instance de classe si elle ne possèdent pas de constructeur

D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:float 3.1415926535898
D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:float 31.415926535898

## Le destructeur
La "vie" d'un objet est limité à l'éxécution de son script. Il est possible de donner des instruction à l'objet juste avant sa destruction.

La méthode __destruct(){} se lance automatiquement quand un objet est détruit et s'éxécute juste avant sa déstruction complète. Cela est utiles dans les cas suivant : enrgistrement des données de l'objet en BDD, en session

## Un objet d'une page à l'autre ?
Donc si un objet est détruit d'une page à l'autre, comment peut-on "passer" cet objet ?

### Serialize / unserialize
En utilisant les session PHP, il est possible d'y enregistrer l'objet créé.

$_SESSION['objetSession'] = serialize($objetScript);

L'objet est donc enregistré ou "sérializé" dans la session PHP. Quand on arrive sur l'autre page, on peut donc récupérer cet objet de le "désérializant dans une variable"

$objetScript = unserialize($_SESSION['objetSession']);

En associant donc le destructeur avec l'enregistrement en session de l'objet, on peut donc créer un objet sur une page et l'utiliser sur les autres pages du site ou de l'application.

# TD Classe Radio
Une radio uniquement sur la bande FM

## Attributs
- marque
- modele
- volume
- frequenceFm
- frequenceActuelle
- limiteDb
## Méthodes
- modifierVolume
- modifierFrequence

```
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:
object(Media\Radio)[3]
  private 'marque' => string 'Radiola' (length=7)
  private 'modele' => string 'Vintage memory' (length=14)
  private 'volume' => int 0
  private 'frequenceFm' => 
    array (size=2)
      0 => float 87.5
      1 => int 108
  private 'frequenceActuelle' => float 87.5
  private 'limiteDb' => int 65
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:int 25
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:int 50
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:int 65
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:int 0
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:float 100.3
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:int 108
D:\wamp64\www\026-php-inter-POO\src\includes\functions.php:7:float 87.5
```