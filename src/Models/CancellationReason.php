<?php

namespace Tompec\CancellationInsights\Models;

use Illuminate\Database\Eloquent\Model;

class CancellationReason extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
