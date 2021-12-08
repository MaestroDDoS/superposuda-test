<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CCBase extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'c_c_base_type_id',
    ];

    public function ccbase_type(): BelongsTo
    {
        return $this->belongsTo(CCBaseType::class);
    }
}
