<?php
require_once './libs/router.php';
require_once './app/controllers/ReseniaController.php';
require_once './app/controllers/UsuarioController.php';
require_once './app/middlewares/jwt.auth.middleware.php';

$router = new Router();

$router->addMiddleware(new JWTAuthMiddleware);

#                 endpoint                 verbo      controller              metodo
$router->addRoute('reseñas',               'GET',     'ReseniaController',   'getReviews');
$router->addRoute('reseñas/:id',           'GET',     'ReseniaController',   'getReview');
$router->addRoute('reseñas/:id',           'PUT',     'ReseniaController',   'update');
$router->addRoute('reseñas',               'POST',    'ReseniaController',   'createReview');

$router->addRoute('usuarios/token',        'GET',     'UsuarioController',   'getToken');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
