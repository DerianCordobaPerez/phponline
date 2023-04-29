<?php

namespace App\Models;

use Domains\Content\Enums\Status;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Source extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'website',
        'feed_url',
        'status',
        'meta',
        'user_id'
    ];

    protected $casts = [
        'status' => Status::class,
        'meta' => AsArrayObject::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    public function articles(): HasMany
    {
        return $this->hasMany(
            related: Article::class,
            foreignKey: 'source_id',
        );
    }
}
