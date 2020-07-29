<?php

use Illuminate\Routing\Router;

$router = app(Router::class);

$router->get('create', CreateCurrencyAction::class);
$router->post('store', StoreCurrencyAction::class);
