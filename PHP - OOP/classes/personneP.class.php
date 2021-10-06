<?php

class PersonneP
{
    private string $prenom;
    private string $nom;
    private string $status;



    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->nom = $prenom;
    }

    public function showPerson () {
        echo "salut, j'suis $this->nom, $this->prenom";
    }

    public function getStatus() : string {
        return $this -> status;
    }

    public function setStatus (string $status) {
        $this -> status = $status;
    }

}

?>