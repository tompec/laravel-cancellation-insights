<?php

namespace Tompec\CancellationInsights\Models;

use Illuminate\Database\Eloquent\Model;

class CancellationInsight extends Model
{
    protected $guarded = [];

    public function causer()
    {
        return $this->morphTo();
    }
}
