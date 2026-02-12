<?php

declare(strict_types=1);

namespace App\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
final class FullEventData extends Data
{
    public function __construct(
        public string $third_party_id,
        public string $event_name,
        public string $venue,
        public string $venue_country,
        public ?string $result,
        public ?CarbonImmutable $start_date,
        public ?string $poster
    ) {}
}
