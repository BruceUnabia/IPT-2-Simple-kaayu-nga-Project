<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
public function run(): void
{
    $file = file_get_contents('./database/seeders/cars.json');
        $data = json_decode($file, true);

        foreach($data['cars'] as $car) {
            Car::create([
                'image' => $car['image'],
                'model' => $car['model'],
                'make' => $car['make'],
                'year' => $car['year'],
                'description' => $car['description'],
            ]);
        }
    }
}
