<?php declare(strict_types = 1);

use App\Models\Country;

final class CountriesSeeder extends Seeder
{
    private int $fakeCountries = 10;
    
    public function run(): void
    {
        for ($i = 1; $i < $this->fakeCountries; $i++) {
            Country::create([
                'name' => $this->faker->country,
            ]);
        }
    }
}
