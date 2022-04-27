<?php
    /**
     * MySpace est une application de gestion des profils 
     * specialement pour les etudiants d'esis test
     * PHP version ^7.4
     * 
     * @category MySpace
     * @package  Myspace
     * @author   Josh Muleshi <jmuleshi2@gmail.com>
     * @license  http://www.apache.org/licenses/LICENSE-2.0 Apaache license
     * @link     http://localhost:8000/home
     */

    require '../vendor/autoload.php';

    $uri = $_SERVER['REQUEST_URI'];
    $router = new AltoRouter();

    $router->map(
        'GET', '/', function () {
            include '../src/View/home.php';
        }
    );
    $router->map(
        'GET', '/home', function () {
            include '../src/View/home.php';
        },
        'home'
    );

    $match = $router->match();

    // call closure or throw 404 status
    if (is_array($match) && is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {
        // no route was matched
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
