<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\UpdateEvent;
use App\Interfaces\ResultsInterface;
use App\Models\Event;
use Illuminate\Console\Command;

final class GetResults extends Command
{
    /**
     * @var string
     */
    protected $signature = 'app:get-results';

    /**
     * @var string
     */
    protected $description = 'Fetch results for all the events we have stored in the database.';

    public function handle(ResultsInterface $resultsService, UpdateEvent $updateEvent): void
    {
        $this->info('Starting Fetching results...');

        // TODO: in the real world paginated and batch this
        $events = Event::query()->get();

        if ($events->isEmpty()) {
            $this->error('No events found.');
        }

        foreach ($events as $event) {
            $results = $resultsService->getResultsByEvent($event->third_party_id);

            $updateEvent->handle($event, null, $results);

            $this->info("{$event->event_name} results updated.");
        }

        $this->info('Finished Fetching results.');
    }
}
