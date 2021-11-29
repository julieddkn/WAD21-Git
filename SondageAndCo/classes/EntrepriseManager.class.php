<?phph

class EtrepriseManager{

    public PDO $dbb;

    public function __construct(PDO $objetBD)
    {
        $this->bdd = $objetBD;   
    }

    //Créer un Entreprise qui fait le sondage
    public function insert(Entreprise $entreprise){
        $sql = "INSERT INTO entreprise (nom, logo, email) " .
            "VALUES (:nom_Entreprise, :logo, :email_Entreprise)";

        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":nom_Entreprise", $entreprise->nom);
        $requete->bindValue(":logo", $entreprise->logo);
        $requete->bindValue(":email_Entreprise", $entreprise->email_Entreprise);

        //requete executé pour inserer l'Entreprise
        $requete->execute();
        
        //recuperation de l'Id automatiquement donné par la DB
        $entreprise->hydrate (['id' => $this->bdd->lastInsertId()]);
    }

    //Supprimer un Entreprise déjà existent
    public function deletEntrepriseParID(Entreprise $entreprise){
            $sql = "DELETE FROM entreprise WHERE id=:id";
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue (":id", $entreprise->getId());
            $requete->execute();

            //uniquement pour gérer les erreurs dans la phase de programmation
            var_dump($requete->errorInfo());
            var_dump($this->bdd->errorInfo());
        }
    }
    
    //Chercher un Entreprise déjà existent
    public function trouver_ID_Entreprise(string $nomEntreprise){
            $sql = "select FROM entreprise WHERE nom LIKE :nom";
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue (":nom", $nomEntreprise);

            //Dans cette requete, vous aurez la liste de toutes les entreprises avec ce nom
            $requete->execute();

            //uniquement pour gérer les erreurs dans la phase de programmation
            var_dump($requete->errorInfo());
            var_dump($this->bdd->errorInfo());
    }
    

    public function select(array $filtres = []): array
    {
        $sql = "SELECT * FROM entreprise";
        if (count($filtres) > 0) {
            $sql = $sql . " WHERE ";

            $arrayFiltresRequete = [];
            foreach ($filtres as $nomFiltre => $valeur) {
                $arrayFiltresRequete[] = $nomFiltre . "=:" . $nomFiltre;
            }

            $sql = $sql . implode(" AND ", $arrayFiltresRequete);
        }

        $requete = $this->bdd->prepare($sql);

        foreach ($filtres as $nomFiltre => $valFiltre) {
            $requete->bindValue(":" . $nomFiltre, $valFiltre);
        }
;
        $requete->execute();

        $res = $requete->fetchAll(PDO::FETCH_ASSOC);

        $arrayObjetsEntreprise = [];
        foreach ($res as $entreprise) {
            $arrayObjetsEntreprise[] = new Entreprise($entreprise);
        }
        return $arrayObjetsEntreprise;
    }


    // on cherche un seul objet, entreprise par ID: une seule ligne, un seul array
    public function selectParId(int $id): Entreprise
    {
        $sql = "SELECT * FROM entreprise WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $arrayUnEntreprise = $requete->fetch(PDO::FETCH_ASSOC);
        return new Entreprise($arrayUnEntreprise);
        
    }
    

    //update entreprise par ID
    public function update (Entreprise $entreprise) : void {
        $sql = "UPDATE entreprise SET nom = :nom, 
                                logo = :logo,
                                email = :email
                WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $entreprise->getId());
        $requete->bindValue(":nom",$entreprise->getNom()); 
        $requete->bindValue(":logo",$entreprise->getLogo());
        $requete->bindValue(":email",$entreprise->getEmail());
        $requete->execute();
        
    }


    
}