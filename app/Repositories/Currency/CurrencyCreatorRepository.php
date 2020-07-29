<?php declare(strict_types = 1);

namespace App\Repositories\Currency;

use App\Models\Currency;
use App\DTOS\CreateCurrency;

final class CurrencyCreatorRepository
{
    private Currency $model;
    
    public function __construct(Currency $model)
    {
        $this->model = $model;
    }
    
    public function create(CreateCurrency $data): Currency
    {
        $currency = $this->model->create($data->toArray());
        
        if (($currency instanceof Currency) === false) {
            return false;
        }
        
        return $currency;
    }
}
