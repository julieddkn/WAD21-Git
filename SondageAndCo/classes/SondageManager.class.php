<?php

include_once "./Sondage.class.php";

class SondageManager{
    
    public PDO $bdd;

public function __construct(PDO $objetBD) 
{
    $this->bdd = $objetBD;
}

//INSERT 
//INSERT INTO `intitule` (`id`, `intitule`, `type`) VALUES (NULL, 'nomSondage', current_timestamp());
public function insert(Sondage $unSondage):void
{
    $sql = "INSERT INTO sondage (intitule, type, reponse) VALUES (:intitule, :type, :reponse)";
    $requete = $this->bdd->prepare($sql);
    $requete->bindValue(":intitule",$unSondage->intitule);
    $requete->bindValue(":type",$unSondage->type);
    $requete->bindValue(":reponse",$unSondage->reponse);
    $requete->execute();
    // var_dump($requete->errorInfo());
    // die();
    $unSondage->hydrate(['id'=>$this->bdd->lastInsertId()]);
}

public function delete(Sondage $unSondage)
    {
        $sql = "DELETE FROM sondage WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $unSondage->getId());
        $requete->execute();
        var_dump($requete->errorInfo());
        var_dump($this->bdd->errorInfo());
    }

public function select(array $filtres = []): array
    {
        $sql = "SELECT * FROM sondage";
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
            $arrayObjetsSondage[] = new Sondage($unSondageArray);
        }
        return $arrayObjetsSondage;
    }

    public function selectParId(int $id): Sondage
    {
        $sql = "SELECT * FROM sondage WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $arrayUnSondage = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne, un seul array
        return new Sondage($arrayUnSondage);
        
    }
    
    public function update (Sondage $unSondage) : void {
        $sql = "UPDATE sondage SET intitule = :intitule, 
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