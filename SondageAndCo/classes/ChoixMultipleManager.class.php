<?php

class ChoixMultipleManager{
    
    public PDO $bdd;

public function __construct(PDO $objetBD) 
{
    $this->bdd = $objetBD;
}

//INSERT 
public function insert(ChoixMultiple $unChoix):void
{
    $sql = "INSERT INTO choixmultiples (proposedanswers, id_question) VALUES (:proposedanswers, :type, :id_question)";
    $requete = $this->bdd->prepare($sql);
    $requete->bindValue(":type",$unChoix->proposedanswers);
    $requete->bindValue(":intitule",$unChoix->id_question);
    $requete->execute();
    // var_dump($requete->errorInfo());
    // die();
    $unChoix->hydrate(['id'=>$this->bdd->lastInsertId()]);
}

public function delete(ChoixMultiple $unChoix)
    {
        $sql = "DELETE FROM choixmultiples WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $unChoix->getId());
        $requete->execute();
        var_dump($requete->errorInfo());
        var_dump($this->bdd->errorInfo());
    }

public function select(array $filtres = []): array
    {
        $sql = "SELECT * FROM choixmultiples";
        // SELECT * from intitule WHERE intitule=:intitule AND type=:type
        if (count($filtres) > 0) {
            $sql = $sql . " WHERE ";

            $arrayFiltresRequete = [];
            foreach ($filtres as $nomFiltre => $valeur) {
                $arrayFiltresRequete[] = $nomFiltre . "=:" . $nomFiltre;
            }
            // var_dump($arrayFiltresRequete);
            $sql = $sql . implode(" AND ", $arrayFiltresRequete);
        }

        $requete = $this->bdd->prepare($sql);

        foreach ($filtres as $nomFiltre => $valFiltre) {
            $requete->bindValue(":" . $nomFiltre, $valFiltre);
        }

        $requete->execute();

        $res = $requete->fetchAll(PDO::FETCH_ASSOC);

        $arrayObjetsSondage = [];
        foreach ($res as $unSondageArray) {
            $arrayObjetsSondage[] = new ChoixMultiple($unSondageArray);
        }
        return $arrayObjetsSondage;
    }

    public function selectParId(int $id): ChoixMultiple
    {
        $sql = "SELECT * FROM choixmultiples WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $arrayUnSondage = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne, un seul array
        return new ChoixMultiple($arrayUnSondage);
        
    }
    
    public function update (ChoixMultiple $unSondage) : void {
        $sql = "UPDATE choixmultiples SET intitule = :intitule, 
                                type = :type,
                                reponse = :reponse
                WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $unSondage->getId());
        $requete->bindValue(":intitule",$unSondage->getIntitule()); 
        $requete->bindValue(":type",$unSondage->getType());
        $requete->bindValue(":reponse",$unSondage->getReponse());
        $requete->execute();
        
    }
}