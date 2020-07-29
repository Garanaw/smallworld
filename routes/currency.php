<?php

use Illuminate\Routing\Router;

$router = app(Router::class);

$router->get('create', CreateCurrencyAction::class)->name('currency.create');
$router->post('store', StoreCurrencyAction::class)->name('currency.store');
