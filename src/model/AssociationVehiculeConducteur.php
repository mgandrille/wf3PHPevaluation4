<?php
namespace App\Model;

class AssociationVehiculeConducteur extends AbstractModel {

    /**
     * Nom de la table en BDD
     * 
     * @var string
     */
    public $tableName = "association_vehicule_conducteur";

        /**
     * VARIABLES
     */
    

    /**
     * @var int
     */
    private $idAssociation;

    /**
     * @var int
     */
    private $idVehicule;

        /**
     * @var int
     */
    private $idConducteur;


    /**
     * FONCTIONS GET ET SET
     */

    /**
     * @return int
     */
    public function getIdAssociation() : int
    {
        return $this->idAssociation;
    }

    /**
     * @param int $idAssociation
     * @return self
     */
    public function setIdAssociation(int $idAssociation) : self
    {
        $this->idAssociation = $idAssociation;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdVehicule() : int
    {
        return $this->idVehicule;
    }

    /**
     * @param int $idVehicule
     * @return self
     */
    public function setIdVehicule(int $idVehicule) : self
    {
        $this->idVehicule = $idVehicule;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdConducteur() : int
    {
        return $this->idConducteur;
    }

    /**
     * @param int $idConducteur
     * @return self
     */
    public function setIdConducteur(int $idConducteur) : self
    {
        $this->idConducteur = $idConducteur;
        return $this;
    }


    /**
     * RELATIONS AVEC LA BASE DE DONNEES
     */

    
    /**
     * Retourne la liste des associations de la BdD
     * 
     * @return array $dataAsObjects
     */
    public static function findAll() {
        
        $bdd = self::getPdo();

        $query = "  SELECT * 
                    FROM association_vehicule_conducteur";
        $response = $bdd->prepare($query);
        $response->execute();

        $data = $response->fetchAll();

        $dataAsObjects = [];

        foreach($data as $d) {
            $dataAsObjects[] = self::toObject($d);
        }

        return $dataAsObjects;
    }

    /**
     * Récupère une association par son id
     */
    public static function findAssociation($idAssociation) {
        $bdd = self::getPdo();

        $query =   "SELECT * 
                    FROM association_vehicule_conducteur 
                    WHERE id_association= :id_association";
        $response = $bdd->prepare($query);
        $response->execute([
            'id_association' => $idAssociation,
        ]);

        $data = $response->fetch();

        // On prépare le tableau qui contiendra nos animaux en format Object
        $dataAsObject = [];

        $dataAsObject[] = self::toObject($data);

        return $dataAsObject;
    }

    /**
     * Transforme un array de données de la table en un objet
     * 
     * @return object $association
     */
    public static function toObject($array) {

        $association = new AssociationVehiculeConducteur;
        $association->setIdAssociation($array['id_association']);
        $association->setIdVehicule($array['id_vehicule']);
        $association->setIdConducteur($array['id_conducteur']);

        return $association;
    }


    /**
     * Création d'une association
     * 
     */
    public static function createAssociation() {
        $bdd = self::getPdo();

        $query =   "INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur)
                    VALUES (:id_vehicule, :id_conducteur)";
        $response = $bdd->prepare($query);
        $response->execute([
            'id_vehicule' => $_POST['id_vehicule'],
            'id_conducteur' => $_POST['id_conducteur']
        ]);
    }

    
    /**
     * Suppression d'un conducteur
     * 
     */
    public static function deleteAssociation($idAssociation) {
        $bdd = self::getPdo();

        $query =   "DELETE FROM association_vehicule_conducteur
                    WHERE id_association= :id_association";
        $response = $bdd->prepare($query);
        $response->execute([
            'id_association' => $idAssociation,
        ]);
    }

    /**
     * Mise à jour d'un conducteur
     * 
     */
    public static function updateAssociation() {
        $bdd = self::getPdo();

        $query =   "UPDATE association_vehicule_conducteur
                    SET id_vehicule = :id_vehicule, id_conducteur = :id_conducteur
                    WHERE id_association= :id_association";
        $response = $bdd->prepare($query);
        $response->execute([
            'id_association' => $_POST['id_association'],
            'id_conducteur'  => $_POST['id_conducteur'],
            'id_vehicule'    => $_POST['id_vehicule']
        ]);
    }




}