<?php

class CompteBancaire 
{
    public string $prenom;
    public string $nom;
    private float $solde;
    private bool $status;

    public function __construct(string $x, string $y, float $z)
    {
        $this->prenom = $x;
        $this->nom = $y;
        $this->solde = $z;
    }

    public function getSolde() : float {
        return $this->solde;
    }
    
    public function retrait(float $montant) : void {
        $this->solde -= $montant;
    }
    
    public function depot(float $montant) : void {
        $this->solde += $montant;
    }
    
    public function modStatus(bool $state) : void {
        $this->status = $state;
        echo $this->status."\n";
    }

}