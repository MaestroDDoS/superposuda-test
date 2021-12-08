<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'client_id',
        'project_type_id',
        'project_status_id',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function project_type(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function project_status(): BelongsTo
    {
        return $this->belongsTo(ProjectStatus::class);
    }
}
