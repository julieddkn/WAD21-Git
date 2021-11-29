<?php

class ChoixMultiple {

    public int $id;
    public string $propositionReponse;
    public int $id_question;

    public function __construct(array $vals)
    {
        $this->hydrate($vals);
    }

    public function hydrate (array $vals){
        foreach ($vals as $nomPropriete => $valeurPropriete) {
            if (isset($vals[$nomPropriete])) {
                // donner une valeur `a la proprieté
                $this->$nomPropriete = $valeurPropriete;
            } 
        }
    }

    /**
     * Get the value of id
     */ 
    public function getid()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of intitule
     */ 
    public function getPropositionReponse()
    {
        return $this->propositionReponse;
    }

    /**
     * Set the value of intitule
     *
     * @return  self
     */ 
    public function setPropositionReponse($propositionReponse)
    {
        $this->propositionReponse = $propositionReponse;

        return $this;
    }

    /**
     * Get the value of reponse
     */ 
    public function getId_question()
    {
        return $this->id_question;
    }
    /**
     * Set the value of reponse
     *
     * @return  self
     */ 
    public function setId_question($id_question)
    {
        $this->id_question = $id_question;
        return $this;
    }
}