<?php
namespace Utils;
use PDO;
use Exception;

/* Tools sera une classe statique : pas de constructeur => on ne créera pas d'instance de cette classe */

class Tools{
    static $pi = 3.1415926535898;

    public static function prePrint($data){
        echo '<pre>'.var_dump($data).'</pre>';
    }

    public static function circo($rayon){
        return 2 * $rayon * self::$pi;
    }

    public static function classActive($page){
        if(basename($_SERVER['PHP_SELF']) == $page){
            echo 'active';
        }
    }

    public static function setBdd($dbhost, $dbname, $user, $psw){
        try{
            $bdd = new PDO('mysql:host=' .$dbhost. ';dbname='.$dbname.';charset=UTF8', $user, $psw, array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e){
            die('Erreur de connexion : ' . $e->getMessage());
        }
        return $bdd;
    }

}

