<?php

declare(strict_types=1);

namespace App\Actions;

use App\Data\EventData;
use App\Data\ResultData;
use App\Models\Event;

final readonly class UpdateEvent
{
    public function handle(Event $event, ?EventData $eventData = null, ?ResultData $resultData = null): void
    {
        /** @var array<string, mixed> $eventDataToUpdate */
        $eventDataToUpdate = $eventData instanceof EventData ? $eventData->toArray() : [];

        if ($resultData instanceof ResultData) {
            /** @var array<string, mixed> $eventDataToUpdate */
            $eventDataToUpdate = [
                ...$eventDataToUpdate,
                ...$resultData->toArray(),
            ];
        }

        $event->update($eventDataToUpdate);
    }
}
