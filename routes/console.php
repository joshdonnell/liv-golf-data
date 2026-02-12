<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command('app:get-events')->daily()->then(function () {
    Artisan::call('app:get-results');
});
