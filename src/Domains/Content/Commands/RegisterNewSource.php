<?php

declare(strict_types=1);

namespace Domains\Content\Commands;

use App\Http\Payloads\Web\Sources\SourcePayload;
use App\Models\Source;
use Domains\Content\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Content\Commands\RegisterNewSourceContract;

final class RegisterNewSource implements RegisterNewSourceContract
{
    public function handle(SourcePayload $payload, string $user): Model|Source
    {
        return DB::transaction(
            callback: static fn () => Source::query()->create(
                attributes: [
                    ...$payload->toArray(),
                    'status' => Status::SUBMITTED,
                    'user_id' => $user,
                ],
            ),
            attempts: 2,
        );
    }
}
