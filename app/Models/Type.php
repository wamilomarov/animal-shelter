<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $color
 * @property float $base_cost
 * @property float $vet_cost
 *
 * @property Collection $animals
 */

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'base_cost',
        'vet_cost',
    ];

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
