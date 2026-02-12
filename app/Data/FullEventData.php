<?php

declare(strict_types=1);

namespace App\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
final class FullEventData extends Data
{
    public function __construct(
        public int $id,
        public string $third_party_id,
        public string $event_name,
        public string $venue,
        public string $venue_country,
        public ?string $result,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd/m/Y H:i')]
        public ?CarbonImmutable $start_date,
        public ?string $poster
    ) {}
}
