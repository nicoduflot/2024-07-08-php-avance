<?php

namespace App;
use Utils\Tools;
class CompteInteret extends Compte
{
    /* Attributs */
    private $taux;

    public function __construct($nom, $prenom, $numcompte, $numagence, $rib, $iban, $solde = 0, $taux = 0.03, $decouvert = 0, $devise = '€'
    ) {
        parent::__construct($nom, $prenom, $numcompte, $numagence, $rib, $iban, $solde, $decouvert, $devise);
        $this->decouvert = 0;
        $this->setTaux($taux);
    }

    /**
     * Get the value of taux
     */
    public function getTaux()
    {
        return $this->taux;
    }

    /**
     * Set the value of taux
     *
     * @return  self
     */
    public function setTaux($taux)
    {
        if (!is_float($taux) || $taux <= 0) {
            echo '
            <div class="alert alert-warning alert-dismissible fade show">
                Le taux d\'intérêt ne peut être une chaîne de caractère ou inférieur ou égal à 0.<br />
                Le taux par défaut de 3% sera appliqué au compte
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            $taux = 0.03;
        }
        $this->taux = $taux;
        return $this;
    }

    public function crediterinterets()
    {
        $message = '';
        $interets = 0;
        if($this->getSolde() > 0){
            $interets = $this->getSolde()*$this->getTaux();
            $this->modifierSolde($interets);
            $message = 'Le compte à intérets à taux '. $this->getTaux()*100 . '% a été crédité de ' . $interets . ' ' . $this->getDevise() .'.';
        }
        return $message;
    }

    public function ficheCompte(): string
    {
        $ficheCompte = parent::ficheCompte();
        $ficheCompte .= '<div class="my-2">Taux d\'intérêt : <b>'.$this->getTaux().'</b></div>';
        return $ficheCompte;
    }

    public function insertCompte(){
        $params = [
            'uniqueid' => 'CPT-'.time(),
            'typecompte' => $this->typeCompte(),
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'numcompte' => $this->numcompte,
            'numagence' => $this->numagence,
            'rib' => $this->rib,
            'iban' => $this->iban,
            'solde' => $this->solde,
            'devise' => $this->devise,
            'taux' => $this->taux,
            'decouvert' => $this->decouvert
        ];

        $sql = '
        INSERT INTO `compte` (
            `uniqueid`, `typecompte`, `nom`,
            `prenom`, `numcompte`, `numagence`,
            `rib`, `iban`, `solde`,
            `devise`, `taux`, `decouvert`
        ) VALUES  (
            :uniqueid, :typecompte, :nom, 
            :prenom, :numcompte, :numagence,
            :rib, :iban, :solde,
            :devise, :taux, :decouvert
        );';
        Tools::modBdd($sql, $params);
    }
}