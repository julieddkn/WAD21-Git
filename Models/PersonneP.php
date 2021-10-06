<?php

class PersonneP {
    private string $prenom;
    private string $nom;

    public function getNom():string
    {
        return $this->nom;
    }

    public function setNom(string $nom):void
    {
        $this->nom = $nom;
    }

    public function getPrenom():string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom):void
    {
        $this->nom = $prenom;
    }

    public function afficher() : void {
        echo "Je suis une personne et je m'appelle $this->getPrenom $this->getNom!!";
    }
}