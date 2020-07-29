<?php declare(strict_types = 1);

namespace App\DTOS;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;

final class CreateCurrency implements Arrayable
{
    private string $currencyName;
    
    private int $countryId;
    
    public function __construct(string $currencyName, int $countryId)
    {
        $this->currencyName = $currencyName;
        $this->countryId = $countryId;
    }
    
    public function toArray(): array
    {
        return [
            'currency'      => $this->currencyName,
            'country_id'    => $this->countryId,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ];
    }
}
