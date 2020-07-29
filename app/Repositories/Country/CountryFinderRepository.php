<?php declare(strict_types = 1);

namespace App\Repositories\Country;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryFinderRepository
{
    private Country $model;
    
    public function __construct(Country $model)
    {
        $this->model = $model;
    }
    
    public function getAllWithoutCurrency(): Collection
    {
        return $this->model
            ->whereDoesntHave('currency')
            ->orderBy('name')
            ->get();
    }
    
    public function getAll(): Collection
    {
        return $this->model
            ->with('currency')
            ->orderBy('name')
            ->get();
    }
}
