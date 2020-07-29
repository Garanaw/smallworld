<?php declare(strict_types = 1);

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
{
    /**
     * @return array<array<mixed>>
     */
    public function rules(): array
    {
        return [
            'currency_name' => [
                'required',
                'string',
                'min:2',
                'max:3',
            ],
            'country_id'    => [
                'required',
                'int',
                'exists:countries,id'
            ],
        ];
    }
    
    public function currencyName(): string
    {
        return $this->get('currency_name');
    }
    
    public function countryId(): int
    {
        return (int)$this->get('country_id');
    }
}
