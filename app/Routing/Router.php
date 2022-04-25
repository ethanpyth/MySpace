<?php
    /** 
    *This file contain the route that redirect
    */
    require '../vendor/autoload.php';

    $uri = $_SERVER['REQUEST_URI'];
    $router = new AltoRouter();

    $router->map(
        'GET', '/', function () {
            echo "salut";
        }
    );
    $router->map(
        'GET', '/home', function () {
            echo 'home';
        }, 'home'
    );

    $match = $router->match();

    // call closure or throw 404 status
    if (is_array($match) && is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']); 
    } else {
        // no route was matched
        header($_SERVER["SERVER_PROTOCOL"] . '404 Not Found');
    }