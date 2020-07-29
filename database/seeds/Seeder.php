<?php declare(strict_types = 1);

use Illuminate\Database\Seeder as BaseSeeder;
use Faker\Factory;
use Faker\Generator as Faker;

class Seeder extends BaseSeeder
{
    protected Faker $faker;
    
    public function __construct()
    {
        $this->faker = Factory::create();
    }
}
