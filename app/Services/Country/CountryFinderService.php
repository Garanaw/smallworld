<?php declare(strict_types = 1);

namespace App\Services\Country;

use App\Repositories\Country\CountryFinderRepository as Repository;
use Illuminate\Database\Eloquent\Collection;

class CountryFinderService
{
    private Repository $repository;
    
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getAllWithoutCurrency(): Collection
    {
        return $this->repository->getAllWithoutCurrency();
    }
}
