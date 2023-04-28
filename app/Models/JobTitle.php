<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class JobTitle extends Model
{
    use HasFactory;
    use HasUlids;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(
            related: User::class,
            foreignKey: 'job_title_id',
        );
    }
}
