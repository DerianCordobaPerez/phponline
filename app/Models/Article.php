<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Dispatchables\AddsSlugFromTitle;
use Domains\Content\Enums\Category;
use Domains\Content\Enums\Level;
use Domains\Content\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Article extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'status',
        'level',
        'category',
        'canonical_url',
        'original',
        'user_id',
        'published_at',
    ];

    protected $casts = [
        'status' => Status::class,
        'level' => Level::class,
        'category' => Category::class,
        'original' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        'creating' => AddsSlugFromTitle::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }
}
