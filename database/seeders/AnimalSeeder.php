<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'dogs',
                'color' => '#2E86C1',
                'vet_cost' => 20,
                'base_cost' => 400,
            ],
            [
                'name' => 'cats',
                'color' => '#E67E22',
                'vet_cost' => 15,
                'base_cost' => 350,
            ],
            [
                'name' => 'rabbits',
                'color' => '#9B59B6',
                'vet_cost' => 25,
                'base_cost' => 700,
            ],
        ];
        foreach ($types as $typeData) {
            /** @var Type $type */
            $type = Type::query()->create($typeData);
            Animal::factory()->count(30)
                ->create([
                    'type_id' => $type->id
                ]);
        }
    }


}
