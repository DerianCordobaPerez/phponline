<?php

declare(strict_types=1);

namespace PHPOnline\Contracts\Http\Requests;

use PHPOnline\Contracts\Http\Payloads\PayloadContract;

interface PayloadRequestContract
{
    public function payload(): PayloadContract;
}
