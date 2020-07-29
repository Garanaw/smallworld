<?php

use Illuminate\Routing\Router;

$router = app(Router::class);

$router->get('show/{currency}', ShowCurrencyAction::class)->name('currency.show');
$router->get('create', CreateCurrencyAction::class)->name('currency.create');
$router->post('store', StoreCurrencyAction::class)->name('currency.store');
