<?php

use Illuminate\Routing\Router;

$router = app(Router::class);

$router->get('/', function () {
    return view('welcome');
})->name('welcome');
