<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Auth;

use App\Http\Payloads\Web\Auth\LoginPayload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use PHPOnline\Contracts\Http\Requests\PayloadRequestContract;
use Treblle\Tools\Http\Enums\Status;

final class LoginRequest extends FormRequest implements PayloadRequestContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'string',
            ]
        ];
    }

    public function authenticate(): void
    {
        if ( ! Auth::attempt($this->payload()->toArray())) {
            abort(Status::UNPROCESSABLE_CONTENT->value);
        }
    }

    public function payload(): LoginPayload
    {
        return LoginPayload::fromArray(
            data: [
                'email' => $this->string('email')->toString(),
                'password' => $this->string('password')->toString(),
            ],
        );
    }
}
