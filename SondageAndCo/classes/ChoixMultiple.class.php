<?php

class ChoixMultiple {

    public int $id;
    public string $proposedanswers;
    public int $idQuestions;

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
        return $this->proposedanswers;
    }
    /**
     * Set the value of intitule
     *
     * @return  self
     */ 
    public function setPropositionReponse($proposedanswers)
    {
        $this->proposedanswers = $proposedanswers;

        return $this;
    }

    /**
     * Get the value of reponse
     */ 
    public function getId_question()
    {
        return $this->idQuestions;
    }
    /**
     * Set the value of reponse
     *
     * @return  self
     */ 
    public function setId_question($idQuestions)
    {
        $this->idQuestions = $idQuestions;
        return $this;
    }
}