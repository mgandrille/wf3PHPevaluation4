<?php 
namespace App\Controller;

use App\Model\Vehicule;

class VehiculeController extends AbstractController {

    public static function index() {
        $vehicules = Vehicule::findAll();
        // var_dump($vehicules);
        echo self::getTwig()->render('vehicule/index.html', [
            'vehicules' => $vehicules
        ]);
    }

    public static function show(int $id) {
        echo 'Montre id #' . $id;
    }

    // public static function create() {
    //     echo 'Formulaire de création' ;
    // }

    public static function new() {
        if(!empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['couleur']) && !empty($_POST['immatriculation'])) {
            Vehicule::createVehicule();
            echo self::index();    
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Veuillez renseigner tous les champs ! 
            </div>';
        }
    }

    public static function edit(int $idVehicule) {
        echo 'formulaire d\'édition id #' . $idVehicule;
        $vehicule = Vehicule::findVehicule($idVehicule);
        echo self::getTwig()->render('vehicule/edit.html', [
            'vehicule' => $vehicule,
        ]);
    }

    public static function update() {
        var_dump($_POST);
        Vehicule::updateVehicule();
        echo self::index();
    }

    public static function delete($idVehicule) {
        Vehicule::deleteVehicule($idVehicule);
        echo self::index();
    }


}