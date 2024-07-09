<?php
namespace Utils;

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
}

