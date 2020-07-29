<?php declare(strict_types = 1);

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\StoreCurrencyRequest as Request;
use App\DTOS\CreateCurrency;
use App\Services\Currency\CurrencyCreatorService as Creator;
use Illuminate\Routing\Redirector;
use Throwable;

class StoreCurrencyAction extends Controller
{
    private Creator $creator;
    
    private Request $request;
    
    private Redirector $redirector;
    
    public function __construct(
        Creator $creator,
        Request $request,
        Redirector $redirector
    ) {
        $this->creator      = $creator;
        $this->request      = $request;
        $this->redirector   = $redirector;
    }
    
    public function __invoke()
    {
        // At this point, the validation should have
        // been already done in the Request class,
        // it is safe to use it
        
        $currency = new CreateCurrency(
            $this->request->currencyName(),
            $this->request->countryId(),
        );
        
        try {
            $this->creator->create($currency);
        } catch (Throwable $exception) {
            return $this->redirector
                ->back()
                ->withErrors($exception->getMessage());
        }
        
        return $this->redirector
            ->route('currency.create');
        
        
    }
}
