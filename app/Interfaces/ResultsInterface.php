<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Data\EventData;
use App\Data\ResultData;

interface ResultsInterface
{
    /**
     * @return array<EventData>
     */
    public function getEventsBySeason(string $seasonSlug): array;

    public function getResultsByEvent(string $thirdPartyEventId): ResultData;
}
