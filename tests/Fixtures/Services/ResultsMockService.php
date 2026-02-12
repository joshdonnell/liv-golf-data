<?php

declare(strict_types=1);

namespace Tests\Fixtures\Services;

use App\Data\EventData;
use App\Data\ResultData;
use App\Interfaces\ResultsInterface;

final class ResultsMockService implements ResultsInterface
{
    /**
     * @return array<EventData>
     */
    public function getEventsBySeason(string $seasonSlug): array
    {
        return [];
    }

    public function getResultsByEvent(string $thirdPartyEventId): ResultData
    {
        return ResultData::from([
            'third_party_id' => '1',
            'event_name' => 'Test Event',
            'result' => 'Test result',
        ]);
    }
}
