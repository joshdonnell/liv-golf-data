<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonImmutable;
use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read string $third_party_id
 * @property-read string $event_name
 * @property-read string $venue
 * @property-read string $venue_country
 * @property-read string|null $poster
 * @property-read string|null $result
 * @property-read CarbonImmutable|null $start_date
 * @property-read int $season_id
 * @property-read CarbonImmutable $created_at
 * @property-read CarbonImmutable $updated_at
 */
final class Event extends Model
{
    /**
     * @use HasFactory<EventFactory>
     */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'id' => 'integer',
            'name' => 'string',
            'event_name' => 'string',
            'venue' => 'string',
            'venue_country' => 'string',
            'poster' => 'string',
            'result' => 'string',
            'start_date' => 'datetime',
            'season_id' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
