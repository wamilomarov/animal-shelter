<?php

namespace App\Services;

use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;

class TypeService
{
    public function index(): Collection
    {
        return Type::all();
    }
}