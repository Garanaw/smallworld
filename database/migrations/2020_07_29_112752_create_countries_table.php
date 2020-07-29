<?php declare(strict_types = 1);

use App\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountriesTable extends Migration
{
    protected array $seeders = [
        CountriesSeeder::class,
    ];
    
    public function up(): void
    {
        $this->schema->create('countries', static function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('countries');
    }
}
