<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'personal_info',
        'birthday',
        'phone',
        'client_source_id',
        'c_c_base_id',
    ];

    protected $casts =
    [
        'birthday' => 'date',
    ];

    public function client_source(): BelongsTo
    {
        return $this->belongsTo(ClientSource::class);
    }

    public function ccbase(): BelongsTo
    {
        return $this->belongsTo(CCBase::class);
    }

    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }
}
