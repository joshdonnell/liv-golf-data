<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Event;
use App\Models\Season;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
final class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'third_party_id' => $this->faker->uuid(),
            'event_name' => $this->faker->word(),
            'result' => $this->faker->word(),
            'venue' => $this->faker->word(),
            'venue_country' => $this->faker->word(),
            'poster' => $this->faker->imageUrl(),
            'season_id' => Season::factory(),
            'start_date' => $this->faker->dateTime(),
            'created_at' => \Illuminate\Support\Facades\Date::now(),
            'updated_at' => \Illuminate\Support\Facades\Date::now(),
        ];
    }
}
