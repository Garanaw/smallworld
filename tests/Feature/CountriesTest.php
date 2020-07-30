<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Country;
use App\Models\Currency;

class CountriesTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertOk();
    }
    
    public function testCountriesAreLoadedWithCurrencies()
    {
        $countryName = 'Test Country';
        $country = Country::create([
            'name' => $countryName,
        ]);
        Currency::create([
            'currency' => 'TCR',
            'country_id' => $country->getId(),
        ]);
        
        $response = $this->get(route('country.index'));
        
        $response->assertOk();
        $result = $this->getDataFromResponse($response);
        
        $target = $result['countries']
            ->first(static fn(Country $country): bool => $country->getName() === $countryName);
        
        $this->assertInstanceOf(Country::class, $target);
        
        $this->assertInstanceOf(Currency::class, $target->getCurrency());
    }
}
