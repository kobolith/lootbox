<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loot>
 */
class LootFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

	 public function definition()
	 {
		 return [
			'friendly_grade' => 'NIL',
			'friendly_name' => 'NIL',
		 ];
	 }

	public function lowTier()
	{
		return $this->state(function (array $attributes) {
			return [
				'friendly_grade' => fake()->randomElement(['Common', 'Uncommon']),
				'friendly_name' => fake()->name(),
			];
		});
	}

	public function midTier()
	{
		return $this->state(function (array $attributes) {
			return [
				'friendly_grade' => fake()->randomElement(['Rare', 'Restricted']),
				'friendly_name' => fake()->name(),
			];
		});

	}

	public function highTier()
	{
		return $this->state(function (array $attributes) {
			return [
				'friendly_grade' => fake()->randomElement(['Classified', 'Covert']),
				'friendly_name' => fake()->name(),
			];
		});
	}
}
