# Composer

Composer est un gestionnaire de paquet, c'est à dire qu'il va aider à installer et gérer des bibliothèques et des dépendances php.

## Installer composer
On peut installer composer en téléchargeant l'instaleur windows sur le site de composer. Il faut le mettre accessible de partout (ne pas l'installer dans un répertoire spécifique).

## Vérifier l'installation
Quand vous êtes à la racine d'un répertoire, à l'aide d'une console, on lance la commande ```composer``` puis entrée.

Si composer n'est pas installé ou n'est pas accessible depuis le projet, il faut le réinstaller. Si il est bien accessible, composer vous répond.

## Initialiser composer
On va à la racine du projet et on lance dans la console la commande suivante : ```composer init```

vous avez ensuite une série de question auxquelles il faut répondre

- Le nom du projet que vous pouvez laisser par défaut
- La description du projet
- L'auteur
- Stabilité minimale, il va permettre de filtrer les librairies par rapport à la valeur qui vous lui attribuez. En tapant ```stable``` tout les packages utilisés doivent être à la version stable.
- Type du package: Ici il s'agit d'un projet, donc on entre project
- License: la licence va définir comment les autres personnes pourront utiliser votre projet
- On répond no aux deux avant-dernières questions, pour ne pas jouer avec les interdépendance des paquets.
- A la toutes dernière question, on réponde n, on s'occupera du psr-4 plus tard.

A la fin, on vous demande de confirmer la génération du fichier ```composer.json``` qui va être le fichier qui référencera les informations, les librairies et les dépendances utilisées dans le projet.

Ce fichier est créé à la racine du projet.

## Installer une dépendance
Composer est un installeur, on va lui demander d'aller chercher la dépendance requise et de l'installer dans le projet, on utilisera la commande composer require .

Par exemple, pour installer les collections de doctrine qu'on va utiliser ensuite, on entrera la commande suivante :

```composer require doctrine/collections```

on voit ensuite que le fichier composer.json a été mis à jour avec a partie suivante :

```
"require": {
  "doctrine/collections": "^2.2"
}
```
Ici, on n'installera pas tous les paquets de doctrine, c'est pour cela qu'on a précisé que l'on choisit doctrine/collections

## Installer d'autres dépendances
composer utilise le dépôt officiel des packages (paquets) Php : [Packagist](https://packagist.org/). Vous y trouverez les paquets et la commande pour les installer.

On peut aussi installer d'autre dépendances en modifiant le fichier ```composer.json```. Après ```"minimum-stability": "stable"```, on ajoute un virgule (on signifie qu'un nouvel attribut est ajouté au json) et à la ligne suivante on ajoute :
```
"require": {
  "doctrine/collections": "^2.2"
}
```
Ensuite, il faut lancer une commande pour dire à composer d'aller vérifier le fichier ```composer.json``` et d'installer les dépendances nouvelles.

```composer update```

Utiliser cette méthode permet aussi de choisir la version du package, ici on a choisi la dernière version stable, notée "^2.2"

on peut gérer les versions par plage en utilisant des opérateurs de comparaison :

- >=1.0 (version 1 et supérieures)
- >=1.0 <=2.0 (Version supérieire ou égale à 1 et inférieure ou égale à 2)
- >=1.0 <1.1 ||>=1.2 (Version supérieire ou égale à 1 et inférieure ou égale à 1.1 OU version supérieur ou égal à 1.2)
- 1.0 - 2.0 (plage de version qui équivaut à >=1.0.0 <2.1)
- 1.0.* (version 1.0 à inférieur strictement à 1.1)
- ~1.4 (version supérieur ou égale à 1.4 mais strictement inférieure à 2.0)
- ^1.4.5 (permet les mises à jour mineures suivantes mais pas la mise à jour majeure 2.0)
## require-dev
Composer permet de spécifier les dépendances utilisées pour le développement. on inscrira alors un nouvel attribut dans le composer.json nommé require-dev.

Pour l'installer en ligne de commande, il faut utiliser composer install et composer update en utilisant l'option --no-dev pour préciser en production de ne pas installer les dépendances contenues dans require-dev

pour le déploiement et les installation en prod, il suffit d'envoyer le code et les fichiers composer.json et composer.lock, on ne prends pas les code des dépendances (présentes dans le répertoire vendor à la racine). Ensuite on utilise composer install --no-dev pour l'installation et composer update --no-dev pour les mises à jour.

## Autoload
Ce fichier de composer permet de pouvoir charger simplement les dépendances installées par composer. On peut ajouter avec composer.json nos propres classes.
```
"autoload": {
  "psr-4":{
    "App\\": "src/Classes"
  }
}
```

```D:\wamp64\www\026-php-inter-POO\src\Classes\Tools.php:21:string 'gogo' (length=4)```

### Installation de Bootstrap
Sur la doc de bootstrap, nous allons utiliser cette commande composer :

```composer require twbs/bootstrap```
Ensuite, comme la dépendance c'est téléchargée dans le répertoire "vendor", qui n'est pas visible par le public, il faut :

1. Créer, par exemple, un fichier "assets" à la racine du site
2. Y copier ce qui se trouve à l'intérieur du fichier "dist" présent dans vendor/twbs/bootstrap/dist
3. ensuite faire le lien vers les fichiers requis pour utiliser bootstrap