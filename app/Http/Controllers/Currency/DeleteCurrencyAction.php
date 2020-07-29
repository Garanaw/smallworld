<?php declare(strict_types = 1);

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\DeleteCurrencyRequest as Request;
use Illuminate\Routing\Redirector;
use App\Services\Currency\CurrencyDeletorService as Deletor;
use App\Models\Currency;
use Throwable;

final class DeleteCurrencyAction extends Controller
{
    private Deletor $deletor;
    
    private Request $request;
    
    private Redirector $redirector;
    
    public function __construct(
        Deletor $deletor,
        Request $request,
        Redirector $redirector
    ) {
        $this->deletor = $deletor;
        $this->request = $request;
        $this->redirector = $redirector;
    }
    
    public function __invoke(Currency $currency)
    {
        // At this point the request should
        // have been validated, so it is safe
        // to delete the currency
        try {
            $this->deletor->delete($currency);
        } catch (Throwable $ex) {
            return $this->redirector
                ->back()
                ->withException($ex);
        }
        
        return $this->redirector->route('currency.create');
    }
}
