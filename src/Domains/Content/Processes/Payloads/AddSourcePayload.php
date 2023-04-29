<?php

declare(strict_types=1);

namespace Domains\Content\Processes\Payloads;

use App\Http\Payloads\Web\Sources\SourcePayload;
use App\Models\Source;
use Illuminate\Database\Eloquent\Model;
use JustSteveKing\BusinessProcess\Contracts\ProcessPayload;

final class AddSourcePayload implements ProcessPayload
{
    public function __construct(
        public string $user,
        public SourcePayload $payload,
        public null|Model|Source $source = null,
    ) {}
}
