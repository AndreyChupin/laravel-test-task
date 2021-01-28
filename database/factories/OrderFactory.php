<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = ['0', '1'];
        $user = User::all()->random();
        return [
            'user_id' => $user->id,
            'status' => $statuses[$this->faker->numberBetween(0, 1)],
            'product_name' => $this->faker->word,
            'quantity' => $this->faker->numberBetween(1, 3),
            'note' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
