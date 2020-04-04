<?php

namespace Tompec\CancellationInsights\Tests;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tompec\CancellationInsights\Models\CancellationInsight;

class User extends Authenticatable
{
    public function cancellations()
    {
        return $this->morphMany(CancellationInsight::class, 'causer');
    }

    public function getCauserAttribute()
    {
        return $this;
    }
}
