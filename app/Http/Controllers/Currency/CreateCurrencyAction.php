<?php declare(strict_types = 1);

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Services\Country\CountryFinderService as CountryFinder;
use Illuminate\View\Factory as View;

class CreateCurrencyAction extends Controller
{
    private CountryFinder $countryFinder;
    
    private View $view;
    
    public function __construct(
        CountryFinder $countryFinder,
        View $view
    ) {
        $this->countryFinder    = $countryFinder;
        $this->view             = $view;
    }
    
    public function __invoke()
    {
        $data = [
            'countries' => $this->countryFinder->getAllWithoutCurrency(),
        ];
        
        return $this->view->make('currency.create', $data);
    }
}
