<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =
    [
        'name',
        'surname',
        'email',
        'password',
        'phone',
        'permissions',
        'user_role_id',
        'email_verified',
    ];

    protected $hidden =
    [
        'password',
        'remember_token',
    ];

    protected $casts =
    [
    ];

    public function user_role(): BelongsTo
    {
        return $this->belongsTo(UserRole::class);
    }
}
