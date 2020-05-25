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


}