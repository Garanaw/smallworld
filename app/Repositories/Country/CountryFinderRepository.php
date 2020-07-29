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
    
    public function getAll(): Collection
    {
        return $this->model->all();
    }
}
