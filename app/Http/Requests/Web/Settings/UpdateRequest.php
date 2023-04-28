<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Settings;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        /**
         * @var User $user
         */
        $user = $this->user();

        return [
            'name' => [
                'sometimes',
                'string',
                'min:2',
                'max:255',
            ],
            'email' => [
                'sometimes',
                'string',
                'min:2',
                'max:255',
                Rule::unique(
                    table: 'users',
                    column: 'email',
                )->ignore(
                    id: $user->getKey(),
                ),
            ],
            'username' => [
                'sometimes',
                'string',
                'min:2',
                'max:255',
                Rule::unique(
                    table: 'users',
                    column: 'username',
                )->ignore(
                    id: $user->getKey(),
                )
            ],
            'github' => [
                'sometimes',
                'string',
                'min:2',
                'max:255',
                Rule::unique(
                    table: 'users',
                    column: 'github',
                )->ignore(
                    id: $user->getKey(),
                )
            ],
            'twitter' => [
                'sometimes',
                'string',
                'min:2',
                'max:255',
                Rule::unique(
                    table: 'users',
                    column: 'twitter',
                )->ignore(
                    id: $user->getKey(),
                )
            ],
            'job_title_id' => [
                'sometimes',
                Rule::exists(
                    table: 'job_titles',
                    column: 'id',
                )
            ],
            'company_id' => [
                'sometimes',
                Rule::exists(
                    table: 'job_titles',
                    column: 'id',
                )
            ],
        ];
    }
}
