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
    /**
     * @param string $numcarte
     * @param string $codepin
     * @param float $montant
     * @param \App\Compte $destinataire
     */
    public function payerparcarte(string $numcarte, string $codepin, float $montant, Compte $destinataire){
        $message = '';
        if($this->getCarte()->getNumcarte() === $numcarte && $this->getCarte()->getCodepin() === $codepin){
            if($this->virement($montant, $destinataire)){
                $etatSolde = ($this->getSolde() < 0)? 'débiteur' : 'créditeur';
                $message = 'Un paiement de ' . $montant . $this->getDevise() . ' a été effectué vers le receveur '. $destinataire->getNom() .'<br />
                Compte ' . $etatSolde . ' : <b>' . $this->getSolde(). ' ' . $this->getDevise() . '</b>';
            }
            return $message;
        }else{
            $message = 'Une erreur est survenue lors de la tentative de paiement de ' . $montant . ' vers le destinataire <b>' . $destinataire->getNom() . '</b>.';
            return $message;
        }
    }

    


}