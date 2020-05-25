<?php
namespace App\Controller;

// require __DIR__ . '/../../vendor/autoload.php';


class AppController extends AbstractController {

    public static function index() {
        echo self::getTwig()->render('app/index.html');
    }

    public static function divers() {
        echo self::getTwig()->render('app/divers.html');
    }

}