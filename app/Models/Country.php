<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public function currency(): HasOne
    {
        return $this->hasOne(Currency::class);
    }
    
    public function getId(): int
    {
        return (int)$this->attributes['id'];
    }
    
    public function getName(): string
    {
        return $this->attributes['name'];
    }
    
    public function hasCurrency(): bool
    {
        return $this->currency !== null;
    }
    
    public function getCurrency(): ?Currency
    {
        return $this->relations['currency'];
    }
}
