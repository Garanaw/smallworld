<?php declare(strict_types = 1);

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use Illuminate\View\Factory as View;
use App\Models\Currency;

final class ShowCurrencyAction extends Controller
{
    private View $view;
    
    public function __construct(View $view)
    {
        $this->view = $view;
    }
    
    public function __invoke(Currency $currency)
    {
        return $this->view->make('currency.show', [
            'currency' => $currency->load('country'),
        ]);
    }
}
