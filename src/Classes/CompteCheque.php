<?php
namespace App;

class CompteCheque extends Compte{
    /* Attributs particliers du compte chèque */
    private $carte;
    /**
     * @param string $nom - le nom du détenteur du compte
     * @param string $prenom - le prénom du détenteur du compte
     * @param string $numcompte - le numéro
     * @param string $numagence - 
     * @param string $rib - 
     * @param string $iban - 
     * @param string $numcarte
     * @param string $codepin
     * @param float  $solde - 
     * @param string $devise - 
     * @param float  $decouvert - 
     */
    public function __construct(
        $nom,
        $prenom,
        $numcompte,
        $numagence,
        $rib,
        $iban,
        $numcarte,
        $codepin,
        $solde = 0,
        $decouvert = 0,
        $devise = '€'
    )
    {
        parent::__construct($nom, $prenom, $numcompte, $numagence, $rib, $iban, $solde, $decouvert, $devise);
        $this->carte = new Carte($numcarte, $codepin);
        $this->toto = 'tata';
    }

    /**
     * Get the value of carte
     */ 
    public function getCarte()
    {
        return $this->carte;
    }

    /* méthode(s) propre(s) à CompteCheque */
    public function payerparcarte($numcarte, $codepin, $montant, $destinataire){
        if($this->getCarte()->getNumcarte() === $numcarte && $this->getCarte()->getCodepin() === $codepin){
            
        }
    }


}