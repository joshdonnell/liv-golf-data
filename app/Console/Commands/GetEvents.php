<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\CreateEvent;
use App\Actions\UpdateEvent;
use App\Interfaces\ResultsInterface;
use App\Models\Event;
use App\Models\Season;
use Illuminate\Console\Command;

final class GetEvents extends Command
{
    /**
     * @var string
     */
    protected $signature = 'app:get-events';

    /**
     * @var string
     */
    protected $description = 'Fetch all events for the current season.';

    public function handle(ResultsInterface $resultsService, CreateEvent $createEvent, UpdateEvent $updateEvent): void
    {
        $this->info('Starting Fetching events...');

        $season = Season::query()->where('slug', config('events.default_season'))->firstOrFail();

        $events = $resultsService->getEventsBySeason($season->slug);

        if ($events === []) {
            $this->error('No events found.');
        }

        foreach ($events as $event) {
            $existingEvent = Event::query()->where('third_party_id', $event->third_party_id)->first();

            if ($existingEvent) {
                $updateEvent->handle($existingEvent, $event);
                $this->info("{$event->event_name} updates.");
            } else {
                $createEvent->handle($event, $season->id);
                $this->info("{$event->event_name} created.");
            }
        }

        $this->info('Finished Fetching events.');
    }
}
