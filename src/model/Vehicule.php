<?php
namespace App\Model;

class Vehicule extends AbstractModel {

    /**
     * Nom de la table en BDD
     * 
     * @var string
     */
    public $tableName = "vehicule";

    /**
     * VARIABLES
     */

    
    /**
     * @var int
     */
    private $idVehicule;

    /**
     * @var string
     */
    private $marque;

    /**
     * @var string
     */
    private $modele;

        /**
     * @var string
     */
    private $couleur;

    /**
     * @var string
     */
    private $immatriculation;

    /**
     * FONCTIONS GET ET SET
     */

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
     * @return string
     */
    public function getMarque() : string
    {
        return $this->marque;
    }

        /**
     * @param int $marque
     * @return self
     */
    public function setMarque($marque) : self
    {
        $this->marque = $marque;
        return $this;
    }

    /**
     * @return string
     */
    public function getModele() : string
    {
        return $this->modele;
    }

    /**
     * @param int $modele
     * @return self
     */
    public function setModele($modele) : self
    {
        $this->modele = $modele;
        return $this;
    }

    /**
     * @return string
     */
    public function getCouleur() : string
    {
        return $this->couleur;
    }

    /**
     * @param int $couleur
     * @return self
     */
    public function setCouleur($couleur) : self
    {
        $this->couleur = $couleur;
        return $this;
    }

    /**
     * @return string
     */
    public function getImmatriculation() : string
    {
        return $this->immatriculation;
    }

    /**
     * @param int $immatriculation
     * @return self
     */
    public function setImmatriculation($immatriculation) : self
    {
        $this->immatriculation = $immatriculation;
        return $this;
    }


    /**
     * RELATIONS AVEC LA BASE DE DONNEES
     */

    
    /**
     * Retourne la liste des conducteurs de la BdD
     * 
     * @return array $dataAsObjects
     */
    public static function findAll() {
        
        $bdd = self::getPdo();

        $query = "SELECT * FROM vehicule";
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
     * Transforme un array de données de la table en un objet
     * 
     * @return object $vehicule
     */
    public static function toObject($array) {

        $vehicule = new Vehicule;
        $vehicule->setIdVehicule($array['id_vehicule']);
        $vehicule->setMarque($array['marque']);
        $vehicule->setModele($array['modele']);
        $vehicule->setCouleur($array['couleur']);
        $vehicule->setImmatriculation($array['immatriculation']);

        return $vehicule;
    }

    /**
     * Création d'un véhicule
     * 
     */
    public static function createVehicule() {
        $bdd = self::getPdo();

        $query =   "INSERT INTO vehicule (marque, modele, couleur, immatriculation)
                    VALUES (:marque, :modele, :couleur, :immatriculation)";
        $response = $bdd->prepare($query);
        $response->execute([
            'marque' => $_POST['marque'],
            'modele' => $_POST['modele'],
            'couleur' => $_POST['couleur'],
            'immatriculation' => $_POST['immatriculation']
        ]);
    }


}