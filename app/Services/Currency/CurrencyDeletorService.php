<?php declare(strict_types = 1);

namespace App\Services\Currency;

use App\Repositories\Currency\CurrencyDeletorRepository as Deletor;
use App\Models\Currency;

final class CurrencyDeletorService
{
    private Deletor $deletor;
    
    public function __construct(Deletor $deletor)
    {
        $this->deletor = $deletor;
    }
    
    public function delete(Currency $currency): void
    {
        $this->deletor->delete($currency);
    }
}
