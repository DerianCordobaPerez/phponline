<?php

declare(strict_types=1);

namespace App\Models\Dispatchables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

final class AddsSlugFromTitle
{
    public function __construct(Model $model)
    {
        $model->slug = Str::slug($model->title);
    }
}
