<?php declare(strict_types = 1);

namespace App\Services\Currency;

use App\Repositories\Currency\CurrencyCreatorRepository as Creator;
use App\DTOS\CreateCurrency;

final class CurrencyCreatorService
{
    private Creator $creator;
    
    public function __construct(Creator $creator)
    {
        $this->creator = $creator;
    }
    
    public function create(CreateCurrency $data): bool
    {
        return $this->creator->create($data);
    }
}
