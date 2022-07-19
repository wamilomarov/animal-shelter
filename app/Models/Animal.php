<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $type_id
 * @property string $name
 * @property Carbon $birthdate
 * @property int $vet_visits
 *
 * @property Type $type
 */

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'name',
        'birthdate',
        'vet_visits',
    ];

    protected $dates = [
        'birthdate'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function age(): int
    {
//        $this->birthdate->toDateString()
        return $this->birthdate->yearsUntil(now())->count();
    }

    public function cost(): float
    {
        $this->loadMissing('type');
        $baseCost = $this->type->base_cost - ($this->age() * 15);
        if ($baseCost <= 0) {
            $baseCost = 15;
        }
        $vetCost = $this->type->vet_cost * $this->vet_visits;

        return $vetCost + $baseCost;
    }
}
