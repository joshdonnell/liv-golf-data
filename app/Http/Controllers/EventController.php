<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Data\FullEventData;
use App\Models\Event;
use Inertia\Inertia;
use Inertia\Response;

final class EventController
{
    public function index(): Response
    {
        $events = Event::query()
            ->where(function ($query): void {
                $query->whereNotNull('result')
                    ->where('result', '!=', '');
            })
            ->orWhereFuture('start_date')
            ->oldest('start_date')
            ->get();

        return Inertia::render('Events', [
            'events' => FullEventData::collect($events),
        ]);
    }

    public function show(Event $event): Response
    {
        return Inertia::render('events/Show', [
            'event' => FullEventData::from($event),
        ]);
    }
}
