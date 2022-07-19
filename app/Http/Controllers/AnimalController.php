<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalIndexRequest;
use App\Models\Animal;
use App\Services\AnimalService;
use App\Services\TypeService;

class AnimalController extends Controller
{
    public function __construct(
        protected AnimalService $animalService,
        protected TypeService $typeService
    )
    {
    }

    public function index(AnimalIndexRequest $request)
    {
        $types = $this->typeService->index();
        $animals = $this->animalService->index($request->get('types'));

        return view('animals.index')->with(compact('types', 'animals'));
    }

    public function show(Animal $animal)
    {
        $animal = $this->animalService->loadRelationsForShow($animal);
        return view('animals.show')->with(compact('animal'));
    }
}
