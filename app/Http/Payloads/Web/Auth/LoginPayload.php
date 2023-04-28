<?php

declare(strict_types=1);

namespace App\Http\Payloads\Web\Auth;

use PHPOnline\Contracts\Http\Payloads\PayloadContract;

final readonly class LoginPayload implements PayloadContract
{
    /**
     * @param string $email
     * @param string $password
     */
    public function __construct(
        private string $email,
        private string $password,
    ) {
    }

    /**
     * @return array{email: string, password: string}
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    /**
     * @param array{email: string, password: string} $data
     * @return LoginPayload
     */
    public static function fromArray(array $data): LoginPayload
    {
        return new LoginPayload(
            email: $data['email'],
            password: $data['password'],
        );
    }
}
