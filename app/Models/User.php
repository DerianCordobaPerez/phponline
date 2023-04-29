<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

final class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasUlids;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'username',
        'twitter',
        'github',
        'available',
        'password',
        'job_title_id',
        'company_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(
            related: JobTitle::class,
            foreignKey: 'job_title_id',
        );
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(
            related: Company::class,
            foreignKey: 'company_id',
        );
    }

    public function sources(): HasMany
    {
        return $this->hasMany(
            related: Source::class,
            foreignKey: 'user_id',
        );
    }

    public function avatar(): Attribute
    {
        $name = trim(collect(explode(' ', $this->name))
            ->map(fn ($segment) => mb_substr($segment, 0, 1))->join(' '));

        return new Attribute(
            get: fn () => 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF',
        );
    }
}
