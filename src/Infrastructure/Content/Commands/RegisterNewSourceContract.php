<?php

declare(strict_types=1);

namespace Infrastructure\Content\Commands;

use App\Http\Payloads\Web\Sources\SourcePayload;
use App\Models\Source;
use Illuminate\Database\Eloquent\Model;

interface RegisterNewSourceContract
{
    public function handle(SourcePayload $payload, string $user): Model|Source;
}
