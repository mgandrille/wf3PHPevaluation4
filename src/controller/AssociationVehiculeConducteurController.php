<?php 
namespace App\Controller;

use App\Model\AssociationVehiculeConducteur;

class AssociationVehiculeConducteurController extends AbstractController {

    public static function index() {
        echo 'Voici la liste de tout';
        $associations = AssociationVehiculeConducteur::findAll();
        var_dump($associations);
        // $conducteur = AssociationVehiculeConducteur::relationAssociationConducteur($associations);
        // $vehicule = AssociationVehiculeConducteur::relationAssociationVehicule($associations);
        echo self::getTwig()->render('associationVehiculeConducteur/index.html', [
            'associations' => $associations,
            // 'conducteur' => $conducteur,
            // 'vehicule' => $vehicule
        ]);

    }

    public static function show(int $id) {
        echo 'Montre id #' . $id;
    }

    // public static function create() {
    //     echo 'Formulaire de création' ;
    // }

    public static function new() {
    }

    public static function edit(int $id) {
        echo 'formulaire d\'édition id #' . $id;
    }

    public static function update() {
        echo 'Edition';
    }

    public static function delete($id) {
        echo 'Suppression id #' . $id;
    }

}