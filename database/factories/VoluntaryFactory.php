<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VoluntaryFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ? string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'cpf' => fake()->numerify('###.###.###-##'),
            'date_birthday' =>  fake()->date(),
            'image_term' => true,
            'data_term' => true,
            'availability' => Str::random(10),
            'course_experience' => Str::random(10),
            'how_know' => Str::random(10),
            'expectations' => Str::random(10),
        ];
    }

}
