<?php

use Bramus\Router\Router;

$router = new Router();
$router->setNamespace('App\Controller');

/**
 * Insérez vos routes ici
 */

$router->get('/', 'AppController@index');

$router->get('/conducteur', 'ConducteurController@index');
$router->get('/conducteur/(\d+)', 'ConducteurController@show');
// $router->get('/conducteur/create', 'ConducteurController@create');
$router->post('/conducteur', 'ConducteurController@new');
$router->get('/conducteur/(\d+)/edit', 'ConducteurController@edit');
$router->post('/conducteur/(\d+)/edit', 'ConducteurController@update');
$router->get('/conducteur/(\d+)/delete', 'ConducteurController@delete');

$router->get('/vehicule', 'VehiculeController@index');
$router->get('/vehicule/(\d+)', 'VehiculeController@show');
// $router->get('/vehicule/create', 'VehiculeController@create');
$router->post('/vehicule', 'VehiculeController@new');
$router->get('/vehicule/(\d+)/edit', 'VehiculeController@edit');
$router->post('/vehicule/(\d+)/edit', 'VehiculeController@update');
$router->post('/vehicule/(\d+)/delete', 'VehiculeController@delete');

$router->get('/association_vehicule_conducteur', 'AssociationVehiculeConducteurController@index');
$router->get('/association_vehicule_conducteur/(\d+)', 'AssociationVehiculeConducteurController@show');
// $router->get('/association_vehicule_conducteur/create', 'AssociationVehiculeConducteurController@create');
$router->post('/association_vehicule_conducteur', 'AssociationVehiculeConducteurController@new');
$router->get('/association_vehicule_conducteur/(\d+)/edit', 'AssociationVehiculeConducteurController@edit');
$router->post('/association_vehicule_conducteur/(\d+)/edit', 'AssociationVehiculeConducteurController@update');
$router->post('/association_vehicule_conducteur/(\d+)/delete', 'AssociationVehiculeConducteurController@delete');


$router->run();

