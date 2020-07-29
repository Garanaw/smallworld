<?php declare(strict_types = 1);

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Services\Country\CountryFinderService as Finder;
use Illuminate\View\Factory as View;

class IndexAction extends Controller
{
    private Finder $finder;
    
    private View $view;
    
    public function __construct(Finder $finder, View $view)
    {
        $this->finder = $finder;
        $this->view = $view;
    }
    
    public function __invoke()
    {
        return $this->view->make('country.show', [
            'countries' => $this->finder->getAll(),
        ]);
    }
}
