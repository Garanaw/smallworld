<?php declare(strict_types = 1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Currency;
use App\Models\Country;

class CurrenciesTest extends TestCase
{
    use RefreshDatabase;
    
    public function testCreateCurrency()
    {
        $country = $this->createCountry();
        
        $currencyName = 'TC'; // Stands for Test Currency
        $data = [
            'currency_name' => $currencyName,
            'country_id' => $country->getId(),
        ];
        
        $response = $this->followingRedirects()
            ->post(route('currency.store'), $data);
        
        $response->assertSeeText($currencyName);
        $response->assertSeeText($country->getName());
    }
    
    public function testCurrencyValidation()
    {
        $country = $this->createCountry();
        
        $name = 'Test Error';
        $data = [
            'currency_name' => $name,
            'country_id' => $country->getId(),
        ];
        
        $response = $this->post(route('currency.store'), $data);
        
        $response->assertSessionHasErrors([
            'currency_name'
        ]);
        
        $name = 'T';
        $data = [
            'currency_name' => $name,
            'country_id' => $country->getId(),
        ];
        
        $response = $this->post(route('currency.store'), $data);
        
        $response->assertSessionHasErrors([
            'currency_name'
        ]);
        
        $data = [
            'currency_name' => 'OK',
        ];
        
        $response = $this->post(route('currency.store'), $data);
        
        $response->assertSessionHasErrors([
            'country_id'
        ]);
    }
    
    public function testDeleteCurrency()
    {
        $country = $this->createCountry();
        
        $currencyName = 'TC'; // Stands for Test Currency
        
        $currency = Currency::create([
            'currency' => $currencyName,
            'country_id' => $country->getId(),
        ]);
        
        $response = $this->followingRedirects()
            ->delete(route('currency.delete', [
                'currency' => $currency->getId(),
            ]), ['currency_id' => $currency->getId()]);
        
        $this->assertDatabaseMissing('currencies', [
            'currency' => $currencyName,
            'country_id' => $country->getId(),
        ]);
    }
    
    private function createCountry(?string $name = null): Country
    {
        $countryName = $name ?? 'Test Country';
        Country::create([
            'name' => $countryName,
        ]);
        
        return Country::whereName($countryName)->first();
    }
}
