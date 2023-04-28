<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Auth;

use App\Http\Payloads\Web\Auth\RegistrationPayload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use PHPOnline\Contracts\Http\Requests\PayloadRequestContract;

final class RegistrationRequest extends FormRequest implements PayloadRequestContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'min:2',
                'max:255'
            ],
            'password' => [
                'required',
                'string',
                Password::default(),
            ]
        ];
    }

    /**
     * @return RegistrationPayload
     */
    public function payload(): RegistrationPayload
    {
        return RegistrationPayload::fromArray(
            data: [
                'name' => $this->string('name')->toString(),
                'email' => $this->string('email')->toString(),
                'password' => Hash::make(
                    value: $this->string('password')->toString(),
                ),
            ],
        );
    }
}
