<?php

declare(strict_types=1);

namespace App\Actions;

use App\Data\EventData;
use App\Models\Event;

final readonly class CreateEvent
{
    public function handle(EventData $eventData, int $seasonId): void
    {
        /** @var array<string, mixed> $eventDataToUpdate */
        $eventDataToUpdate = [
            ...$eventData->toArray(),
            'season_id' => $seasonId,
        ];

        Event::query()->create($eventDataToUpdate);
    }
}
