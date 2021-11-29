<?php

class Entreprise{
    private int id;
    private string nom;
    private string logo;
    private string email;

    //  constructeur
    public function __construct(array $vals)
    {
        $this->hydrate($vals);
    }
    
    public function hydrate (array $vals){
        foreach ($vals as $nomPropriete => $valeurPropriete){
            if (isset($vals[$nomPropriete])) {
                $this->$nomPropriete = $valeurPropriete;
            }
        }
    }


    /**
     * Get the value of couleur
     */
    public function getId()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */
    public function setId($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get the value of couleur
     */
    public function getNom()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */
    public function setNom($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get the value of couleur
     */
    public function getLogo()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */
    public function setLogo($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }
    /**
     * Get the value of couleur
     */
    public function getEmail()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */
    public function setEmail($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }


    

}