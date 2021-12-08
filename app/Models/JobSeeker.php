<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'personal_info',
        'birthday',
        'phone',
        'vacancy_id',
        'job_seeker_source_id',
    ];

    protected $casts =
    [
        'birthday' => 'date',
    ];

    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function job_seeker_source(): BelongsTo
    {
        return $this->belongsTo(JobSeekerSource::class);
    }

    public function interviews(): HasMany
    {
        return $this->hasMany(Interview::class);
    }
}
