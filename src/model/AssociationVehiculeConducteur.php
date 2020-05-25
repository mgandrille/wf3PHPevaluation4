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


}