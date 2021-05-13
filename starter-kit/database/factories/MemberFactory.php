<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname'=> $this->faker->name,
            'lastname'=> $this->faker->name,
            'middlename'=> $this->faker->name,
            'adrress'=> $this->faker->name,
            'contactNumber'=> $this->faker->name,
            'emailAddress'=> $this->faker->name,
        ];
    }
}
