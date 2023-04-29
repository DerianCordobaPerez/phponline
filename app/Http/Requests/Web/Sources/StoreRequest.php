<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Sources;

use App\Http\Payloads\Web\Sources\SourcePayload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use PHPOnline\Contracts\Http\Payloads\PayloadContract;
use PHPOnline\Contracts\Http\Requests\PayloadRequestContract;

final class StoreRequest extends FormRequest implements PayloadRequestContract
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
            'website' => [
                'required',
                'url',
                Rule::unique(
                    table: 'sources',
                    column: 'website',
                ),
            ],
            'feed_url' => [
                'required',
                'url',
                Rule::unique(
                    table: 'sources',
                    column: 'website',
                ),
            ],
        ];
    }

    public function payload(): SourcePayload
    {
        return SourcePayload::fromArray(
            data: (array) $this->validated(),
        );
    }
}
