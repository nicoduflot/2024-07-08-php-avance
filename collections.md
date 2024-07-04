# Collections
## Principes

Les collections permettent de créer des collections de tableaux
```
$collection = new ArrayCollection();
$collection->add("Nicolas Duflot");
```
La doc complète de ArrayCollection se trouve [ici](https://www.doctrine-project.org/projects/doctrine-collections/en/stable/index.html)

```
D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Doctrine\Common\Collections\ArrayCollection)[4]
  private array 'elements' => 
    array (size=0)
      empty

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Doctrine\Common\Collections\ArrayCollection)[4]
  private array 'elements' => 
    array (size=1)
      0 => string 'Nicolas Duflot' (length=14)

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Doctrine\Common\Collections\ArrayCollection)[4]
  private array 'elements' => 
    array (size=3)
      0 => string 'Nicolas Duflot' (length=14)
      1 => string 'Benoit Poulard' (length=14)
      2 => string 'Pierre Coste' (length=12)

0

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Doctrine\Common\Collections\ArrayCollection)[4]
  private array 'elements' => 
    array (size=3)
      0 => string 'Nicolas Duflot' (length=14)
      1 => string 'Benoit Poulard' (length=14)
      2 => string 'Pierre Coste' (length=12)

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:boolean true

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:boolean false

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:int 3

Nicolas Duflot;Benoit Poulard;Pierre Coste;

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:int 0

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Doctrine\Common\Collections\ArrayCollection)[4]
  private array 'elements' => 
    array (size=6)
      0 => string 'Nicolas Duflot' (length=14)
      1 => string 'Benoit Poulard' (length=14)
      2 => string 'Pierre Coste' (length=12)
      3 => string 'Geralt Derive' (length=13)
      4 => string 'Cixi' (length=4)
      5 => string 'Lanfeust' (length=8)

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Doctrine\Common\Collections\ArrayCollection)[6]
  private array 'elements' => 
    array (size=5)
      3 => int 4
      4 => int 5
      5 => int 6
      6 => int 7
      7 => int 8

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Doctrine\Common\Collections\ArrayCollection)[7]
  private array 'elements' => 
    array (size=4)
      1 => int 2
      3 => int 4
      5 => int 6
      7 => int 8

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
array (size=2)
  0 => 
    object(Doctrine\Common\Collections\ArrayCollection)[5]
      private array 'elements' => 
        array (size=4)
          1 => int 2
          3 => int 4
          5 => int 6
          7 => int 8
  1 => 
    object(Doctrine\Common\Collections\ArrayCollection)[8]
      private array 'elements' => 
        array (size=4)
          0 => int 1
          2 => int 3
          4 => int 5
          6 => int 7

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Doctrine\Common\Collections\ArrayCollection)[4]
  private array 'elements' => 
    array (size=7)
      0 => string 'Nicolas Duflot' (length=14)
      1 => string 'Benoit Poulard' (length=14)
      2 => string 'Pierre Coste' (length=12)
      3 => string 'Geralt Derive' (length=13)
      4 => string 'Cixi' (length=4)
      5 => string 'Lanfeust' (length=8)
      'toto' => string 'tata' (length=4)

D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:
object(Doctrine\Common\Collections\ArrayCollection)[4]
  private array 'elements' => 
    array (size=7)
      0 => string 'Nicolas Duflot' (length=14)
      1 => string 'Benoit Poulard' (length=14)
      2 => string 'Pierre Coste' (length=12)
      3 => string 'Geralt Derive' (length=13)
      4 => string 'Cixi' (length=4)
      5 => string 'Lanfeust' (length=8)
      'toto' => string 'tutu' (length=4)
```