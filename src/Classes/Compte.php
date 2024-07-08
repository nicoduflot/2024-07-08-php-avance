<?php
namespace App;

class Compte{
    /* Attributs en privé */
    private $nom;
    private $prenom;
    private $numcompte;
    private $numagence;
    private $rib;
    private $iban;
    private $solde;
    private $devise;
    private $decouvert;
    
    /* 
    pour pouvoir utiliser la classe, créer une instance de la classe, il faut contruire l'objet 
    Quand on invoque la classe, on appelle la méthode qui est le constructeur de l'objet
    */
    /*
    @param indique en annotation à l'utilisateur de la classe quels sont les paramètre à indiquer pour voir utiliser cette classe et surtout de quel type (int, string, etc) le paramètre doit être pour que la classe s'instancie correctement
    */
    /**
     * @param string $nom - le nom du détenteur du compte
     * @param string $prenom - le prénom du détenteur du compte
     * @param string $numcompte - le numéro
     * @param string $numagence - 
     * @param string $rib - 
     * @param string $iban - 
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
        $solde = 0,
        $devise = '€',
        $decouvert = 0
        ){
        /* $this : dans cet objet que je crée */
        /* -> je cherche l'attribut ou la méthode nommé  */
        /* ici c'est l'attribut nom */
        /* que j'instancie avec la variable $nom envoyé par l'invocation de la classe */
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numcompte = $numcompte;
        $this->numagence = $numagence;
        $this->rib = $rib;
        $this->iban = $iban;
        $this->solde = $solde;
        $this->devise = $devise;
        $this->decouvert = $decouvert;
    }

    /* getters et setters */
    

    /**
     * Get the value of nom
     * @return string
     */ 
    public function getNom() : string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of numcompte
     */ 
    public function getNumcompte()
    {
        return $this->numcompte;
    }

    /**
     * Set the value of numcompte
     *
     * @return  self
     */ 
    public function setNumcompte($numcompte)
    {
        $this->numcompte = $numcompte;

        return $this;
    }

    /**
     * Get the value of numagence
     */ 
    public function getNumagence()
    {
        return $this->numagence;
    }

    /**
     * Set the value of numagence
     *
     * @return  self
     */ 
    public function setNumagence($numagence)
    {
        $this->numagence = $numagence;

        return $this;
    }

    /**
     * Get the value of rib
     */ 
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * Set the value of rib
     *
     * @return  self
     */ 
    public function setRib($rib)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get the value of iban
     */ 
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set the value of iban
     *
     * @return  self
     */ 
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get the value of solde
     */ 
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     *
     * @return  self
     */ 
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get the value of devise
     */ 
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set the value of devise
     *
     * @return  self
     */ 
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get the value of decouvert
     */ 
    public function getDecouvert()
    {
        return $this->decouvert;
    }

    /**
     * Set the value of decouvert
     *
     * @return  self
     */ 
    public function setDecouvert($decouvert)
    {
        $this->decouvert = $decouvert;

        return $this;
    }

    /* les méthodes propres à tous les type de compte */
    public function modifierSolde($montant){
        //$this->solde = $this->solde + $montant;
        $this->setSolde($this->getSolde() + $montant);
    }

    /**
     * @param float $montant - montant positif et entier ou flottant de la transaction
     * @param object $destinataire - objet instance de la classe Compte
     */
    public function virement($montant, Compte $destinataire){
        $message = '';
        if( (!is_float($montant) && !is_int($montant) ) && $montant <= 0 ){
            $message = 'Le montant doit être un chiffre supérieur à 0';
            return $message;
        }
        if( ($this->getSolde() - $montant) <= -($this->getDecouvert()) ){
            $message = 'Votre virement dépasse votre découvert autorisé de '. $this->getDecouvert(). ' '.$this->getDevise().'.';
            return $message;
        }
        $this->modifierSolde(-$montant);
        $destinataire->modifierSolde($montant);
        $message = 'Le compte n°'.$destinataire->getNumcompte(). ' a été crédité de '.$montant. ' ' .$this->getDevise() .'.';
        return $message;
    }


    
}