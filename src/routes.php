<?php

use Tompec\CancellationInsights\Controllers;

Route::post('/cancellations-insights', [Controllers\CancellationInsightController::class, 'store']);
Route::get('/cancellation-reasons', [Controllers\CancellationReasonController::class, 'index']);
