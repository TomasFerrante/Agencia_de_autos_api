<?php
require_once './libs/router.php';
require_once './app/controllers/ReseniaController.php';

$router = new Router();

#                 endpoint                 verbo      controller              metodo
$router->addRoute('reseñas',               'GET',     'ReseniaController',   'getReviews');
$router->addRoute('reseña/:id',            'PUT',     'ReseniaController',   'update');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
