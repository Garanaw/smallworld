<?php declare(strict_types = 1);

namespace App\Repositories\Currency;

use App\Models\Currency;

final class CurrencyDeletorRepository
{
    public function delete(Currency $currency): void
    {
        $currency->delete();
    }
}
