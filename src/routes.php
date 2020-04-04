<?php

use Tompec\CancellationInsights\Controllers;

Route::middleware(config('cancellation-insights.middlewares'))->group(function () {
    Route::post('/cancellation-insights', [Controllers\CancellationInsightController::class, 'store']);
    Route::get('/cancellation-reasons', [Controllers\CancellationReasonController::class, 'index']);
});
