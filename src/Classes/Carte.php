<?php
namespace App;
use Utils\Tools;
class Carte{
    private $numcarte;
    private $codepin;

    /**
     * Carte constructor
     * @param string numcarte
     * @param string codepin
     */
    public function __construct($numcarte, $codepin){
        $this->numcarte = $numcarte;
        $this->codepin = $codepin;
    }

    /**
     * Get the value of numcarte
     */ 
    public function getNumcarte()
    {
        return $this->numcarte;
    }

    /**
     * Set the value of numcarte
     *
     * @return  self
     */ 
    public function setNumcarte($numcarte)
    {
        $this->numcarte = $numcarte;
        return $this;
    }

    /**
     * Get the value of codepin
     */ 
    public function getCodepin()
    {
        return $this->codepin;
    }

    /**
     * Set the value of codepin
     *
     * @return  self
     */ 
    public function setCodepin($codepin)
    {
        $this->codepin = $codepin;
        return $this;
    }

    public function insertcard(){
        $sql = 'INSERT INTO `carte` (`cardnumber`, `codepin`) VALUES ( :cardnumber, :codepin); ';
        $params = [
            'cardnumber' => $this->numcarte,
            'codepin' => $this->codepin
        ];
        $id = Tools::insertBdd($sql, $params);
        return $id;
    }
}