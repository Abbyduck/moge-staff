<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StaffsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'attendance_no' => $this->faker->unique()->numberBetween(1,1000),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'department_id' => $this->faker->numberBetween(1,7),
            'entry_date' => $this->faker->date(),
            'birthday' => $this->faker->date('Y-m-d',date('Y-m-d',strtotime('-18 years'))),
            'gender' => $this->faker->numberBetween(0,1),
        ];
    }
}
