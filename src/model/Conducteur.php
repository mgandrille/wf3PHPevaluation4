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



}