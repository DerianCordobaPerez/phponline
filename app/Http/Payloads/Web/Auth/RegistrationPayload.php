<?php

declare(strict_types=1);

namespace App\Http\Payloads\Web\Auth;

use PHPOnline\Contracts\Http\Payloads\PayloadContract;

final readonly class RegistrationPayload implements PayloadContract
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
    ) {
    }

    /**
     * @return array{name: string, email: string, password: string}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    /**
     * @param array{name: string, email: string, password: string} $data
     * @return RegistrationPayload
     */
    public static function fromArray(array $data): RegistrationPayload
    {
        return new RegistrationPayload(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );
    }
}
