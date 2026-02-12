<?php

declare(strict_types=1);

namespace App\Providers;

use App\Interfaces\ResultsInterface;
use App\Services\TheSportsDBService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(fn (): ResultsInterface => new TheSportsDBService(
            Config::string('services.thesportsdb.api_key'),
            Config::string('services.thesportsdb.api_url'),
            (int) config('services.thesportsdb.sport_id'),
        ));
    }
}
