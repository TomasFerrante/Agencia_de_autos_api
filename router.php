<?php
require_once './libs/router.php';
require_once './app/controllers/ReseniaController.php';

$router = new Router();

#                 endpoint                 verbo      controller              metodo
$router->addRoute('reseñas',               'GET',     'ReseniaController',   'getReviews');
$router->addRoute('reseñas/:id',           'PUT',     'ReseniaController',   'update');
$router->addRoute('reseñas',               'POST',    'ReseniaController',   'createReview');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
