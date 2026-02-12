<?php

declare(strict_types=1);

namespace App\Services;

use App\Data\EventData;
use App\Data\ResultData;
use App\Exceptions\NoEventsForSeasonException;
use App\Interfaces\ResultsInterface;
use Carbon\CarbonImmutable;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

final readonly class TheSportsDBService implements ResultsInterface
{
    public function __construct(
        private string $apiKey,
        private string $baseUrl,
        private int $sportId
    ) {}

    /**
     * @return array<EventData>
     *
     * @throws ConnectionException|NoEventsForSeasonException
     */
    public function getEventsBySeason(string $seasonSlug): array
    {
        $request = $this->builder()->get("/schedule/league/{$this->sportId}/{$seasonSlug}");
        $response = $request->json();

        throw_if(! is_array($response) || empty($response['schedule']), NoEventsForSeasonException::class, "No events found for the {$seasonSlug}");

        /** @var array<int, array<string, mixed>> $schedule */
        $schedule = $response['schedule'];

        /** @var array<int, array<string, mixed>> $events */
        $events = array_map(fn (array $event): array => [
            'third_party_id' => $event['idEvent'],
            'event_name' => $event['strEvent'],
            'venue' => $event['strVenue'],
            'venue_country' => $event['strCountry'],
            'start_date' => $event['strTimestamp'] ? CarbonImmutable::parse($event['strTimestamp']) : null,
            'poster' => $event['strPoster'],
        ], $schedule);

        return EventData::collect($events);
    }

    /**
     * @throws ConnectionException|NoEventsForSeasonException
     */
    public function getResultsByEvent(string $eventId): ResultData
    {
        $request = $this->builder()->get("/lookup/event/{$eventId}");
        $response = $request->json();

        throw_if(! is_array($response) || ! is_array($response['lookup']) || empty($response['lookup']), NoEventsForSeasonException::class, "No event found for the {$eventId}");

        /** @var array<string, mixed> $event */
        $event = $response['lookup'][0];

        return ResultData::from([
            'third_party_id' => $event['idEvent'],
            'event_name' => $event['strEvent'],
            'result' => $event['strResult'],
        ]);
    }

    private function builder(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl)
            ->withHeaders(['X-API-KEY' => $this->apiKey]);
    }
}
