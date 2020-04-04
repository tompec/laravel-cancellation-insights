<?php

use Tompec\CancellationInsights\Models\CancellationInsight;

$factory->define(CancellationInsight::class, function () {
    return [
        'causer_id' => 1,
        'causer_type' => 'App\User',
        'comment' => 'lorem ipsum',
    ];
});
