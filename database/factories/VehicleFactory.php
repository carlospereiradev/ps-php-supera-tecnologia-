<?php

namespace Database\Factories;

use App\Models\{
    Maintenance,
    Vehicle
};
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    public function definition()
    {
        $brand = $this->getBrand();
        $model = $this->getModel($brand['codigo']);
        
        return [
            'brand'     => $brand['nome'],
            'model'     => $model['nome'],
            'version'   => fake()->randomFloat(1, 1, 8),
            'plate'     => fake()->regexify('[A-Z]{3}-[0-9]{1}[A-Z]{1}[0-9]{2}'),
        ];
    }

    public function getBrand()
    {   
        $url = 'https://parallelum.com.br/fipe/api/v1/carros/marcas';
        
        $brands = json_decode(file_get_contents($url), true);
        
        return $brands[array_rand($brands)];
    }
    
    public function getModel($id)
    {   
        $url = "https://parallelum.com.br/fipe/api/v1/carros/marcas/$id/modelos";
        
        $models = json_decode(file_get_contents($url), true);
        
        return $models['modelos'][array_rand($models['modelos'])];
    }

    public function configure()
    {
        return $this->afterCreating(function (Vehicle $vehicle) {
            Maintenance::factory()->for($vehicle)->count(5)->create([
                'user_id' => $vehicle->user_id,
            ]);
        });
    }
}
