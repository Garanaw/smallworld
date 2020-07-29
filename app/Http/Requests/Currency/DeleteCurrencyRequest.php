<?php declare(strict_types = 1);

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;

final class DeleteCurrencyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'currency_id'   => [
                'required',
                'int',
                'exists:currencies,id',
            ],
            'currency'      => [
                'required',
                'int',
                'exists:currencies,id',
                function($_, $value, $fail) {
                    // Small tamper check to ensure we're deleting the right currency
                    if ((int)$value !== (int)$this->get('currency_id')) {
                        $fail(__('currency.unable_to_delete'));
                    }
                }
            ],
        ];
    }
    
    protected function prepareForValidation(): void
    {
        $this->merge([
            'currency' => $this->route('currency'),
        ]);
    }
}
