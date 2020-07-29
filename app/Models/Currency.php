<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Currency extends Model
{
    protected $fillable = [
        'currency',
        'country_id',
    ];
    
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    
    public function getId(): int
    {
        return (int)$this->attributes['id'];
    }
    
    public function getName(): string
    {
        return $this->attributes['currency'];
    }
    
    public function getCountry(): Country
    {
        if ($this->relationLoaded('country') === false) {
            $this->load('country');
        }
        
        return $this->relations['country'];
    }
}
