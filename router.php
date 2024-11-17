<?php
    require_once 'libs/router.php';
    require_once 'app/controllers/peli.api.controller.php';

    $router = new Router();

    $router->addRoute('peliculas', 'GET', 'PeliApiController', 'getAll');
    $router->addRoute('peliculas/:id', 'GET', 'PeliApiController', 'get');
    $router->addRoute('peliculas', 'POST', 'PeliApiController', 'create');
    $router->addRoute('peliculas/:id', 'PUT', 'PeliApiController', 'update');


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);