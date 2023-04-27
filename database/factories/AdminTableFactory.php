<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;
use Faker\Generator as Faker;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdminTableFactory extends Factory
{
    // $factory->define(Admin::class, function (Faker $faker) {
    //     return [
    //         'name' => $faker->name,
    //         'email' => $faker->unique()->safeEmail,
    //         'password' => $faker->password,
    //     ];
    // });

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
