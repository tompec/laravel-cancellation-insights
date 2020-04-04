<?php

use Tompec\CancellationInsights\Models\CancellationReason;

$factory->define(CancellationReason::class, function () {
    return [
        'reason' => 'Too expensive',
        'requires_comment' => false,
        'index' => 1,
        'is_active' => 1,
    ];
});
