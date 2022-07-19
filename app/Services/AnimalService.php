<?php

namespace App\Services;

use App\Models\Animal;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class AnimalService
{
    public function index(?array $types): LengthAwarePaginator
    {
        return Animal::query()
            ->with('type')
            ->when(
                !empty($types),
                fn(Builder $query) => $query->whereHas('type', fn(Builder $query) => $query->whereIn('name', $types))
            )
            ->latest()
            ->paginate();
    }

    public function loadRelationsForShow(Animal $animal): Animal
    {
        $animal->loadMissing(['type']);
        return $animal;
    }
}