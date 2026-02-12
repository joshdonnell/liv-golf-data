<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
final class ResultData extends Data
{
    public function __construct(
        public string $third_party_id,
        public string $event_name,
        public ?string $result,
    ) {}
}
