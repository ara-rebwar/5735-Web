<?php

namespace Database\Factories;

use App\Models\market;
use Illuminate\Database\Eloquent\Factories\Factory;

class marketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = market::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->name(),
            "image"=>(int)40040,
            "mobile1"=>$this->faker->text(11),
            "mobile2"=>$this->faker->text(11),
            "closed"=>(int)0,
            "type"=>(int)8,
            "address"=>(int)2,
            "has_product"=>(int)1,
            "MSSQL_ID"=>(int)0,
            "icon"=>(int)40045,
            "name_kurdish"=>$this->faker->text(10),
        ];
    }
}
