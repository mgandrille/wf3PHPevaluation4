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