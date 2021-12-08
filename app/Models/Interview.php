<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interview extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'datetime',
        'job_seeker_id',
        'vacancy_id',
        'user_id',
        'interview_status_id',
        'office_id',
        'comment',
    ];

    protected $casts =
    [
        'datetime' => 'datetime',
    ];

    public function job_seeker(): BelongsTo
    {
        return $this->belongsTo(JobSeeker::class);
    }

    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function interview_status(): BelongsTo
    {
        return $this->belongsTo(InterviewStatus::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }
}
