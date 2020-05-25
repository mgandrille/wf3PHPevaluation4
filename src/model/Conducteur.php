<?php
namespace App\Model;

class Conducteur extends AbstractModel {

    /**
     * Nom de la table en BDD
     * 
     * @var string
     */
    public $tableName = "conducteur";
    
    /**
     * VARIABLES
     */
    
    /**
     * @var int
     */
    private $idConducteur;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $nom;

    /**
     * FONCTIONS GET ET SET
     */

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
    public function setId(int $idConducteur) : self
    {
        $this->idConducteur = $idConducteur;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom() : string
    {
        return $this->prenom;
    }

        /**
     * @param int $prenom
     * @return self
     */
    public function setPrenom($prenom) : self
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom() : string
    {
        return $this->nom;
    }

    /**
     * @param int $nom
     * @return self
     */
    public function setNom($nom) : self
    {
        $this->nom = $nom;
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

        $query = "SELECT * FROM conducteur";
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
     * @return object $conducteur
     */
    public static function toObject($array) {

        $conducteur = new Conducteur;
        $conducteur->setId($array['id_conducteur']);
        $conducteur->setPrenom($array['prenom']);
        $conducteur->setNom($array['nom']);

        return $conducteur;
    }

    /**
     * Création d'un conducteur
     * 
     */
    public static function createConducteur() {
        $bdd = self::getPdo();

        $query =   "INSERT INTO conducteur (prenom, nom)
                    VALUES (:prenom, :nom)";
        $response = $bdd->prepare($query);
        $response->execute([
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom']
        ]);
    }


}