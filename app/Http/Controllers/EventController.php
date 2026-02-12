<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Event;

final class EventController
{
    public function index(): void {}

    public function show(Event $event): void {}
}
