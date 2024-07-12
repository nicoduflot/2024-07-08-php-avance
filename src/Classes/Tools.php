<?php
namespace Utils;
use PDO;
use Exception;

/* Tools sera une classe statique : pas de constructeur => on ne créera pas d'instance de cette classe */

class Tools implements Config_interface{
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

    /*
    public static function setBdd($dbhost, $dbname, $user, $psw){
        try{
            $bdd = new PDO('mysql:host=' .$dbhost. ';dbname='.$dbname.';charset=UTF8', $user, $psw, array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e){
            die('Erreur de connexion : ' . $e->getMessage());
        }
        return $bdd;
    }
    */

    /* on se sert de l'interface Config_interface pour récupérer la configuration du mysql local ou en ligne */
    public static function setBdd(){
        try{
            $bdd = new PDO('mysql:host=' .Config_interface::DBHOST. ';dbname='.Config_interface::DBNAME.';charset=UTF8', Config_interface::DBUSER, Config_interface::DBUPSW, array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e){
            die('Erreur de connexion : ' . $e->getMessage());
        }
        return $bdd;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return mixed
     */
    public static function modBdd($sql, $params = []) : mixed{
        $bdd = self::setBdd();
        $req = $bdd->prepare($sql);
        $req->execute($params);
        return $req;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return mixed
     */
    public static function insertBdd($sql, $params = []) : mixed{
        $bdd = self::setBdd();
        $req = $bdd->prepare($sql);
        $req->execute($params);
        return $bdd->lastInsertId();
    }

}

