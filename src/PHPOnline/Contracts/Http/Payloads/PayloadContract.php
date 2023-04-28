<?php

declare(strict_types=1);

namespace PHPOnline\Contracts\Http\Payloads;

interface PayloadContract
{
    public function toArray(): array;

    public static function fromArray(array $data): PayloadContract;
}
