<?php

use Illuminate\Routing\Router;

$router = app(Router::class);

$router->get('/', IndexAction::class)->name('country.index');
