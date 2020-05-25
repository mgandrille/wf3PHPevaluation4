<?php 
namespace App\Controller;

use App\Model\Conducteur;

class ConducteurController extends AbstractController {

    public static function index() {
        $conducteurs = Conducteur::findAll();
        echo self::getTwig()->render('conducteur/index.html', [
            'conducteurs' => $conducteurs
        ]);
    }

    public static function show(int $id) {
        echo 'Montre id #' . $id;
    }

    // public static function create() {
    //     echo 'Formulaire de création' ;
    // }

    public static function new() {
        if(!empty($_POST['nom']) && !empty($_POST['prenom'])) {
            Conducteur::createConducteur();
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