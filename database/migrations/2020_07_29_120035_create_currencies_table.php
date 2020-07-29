<?php declare(strict_types = 1);

use App\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrenciesTable extends Migration
{
    public function up(): void
    {
        $this->schema->create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('currency', 3);
            $table->foreignId('country_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('currencies');
    }
}
