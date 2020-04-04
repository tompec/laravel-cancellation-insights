<?php

use Tompec\CancellationInsights\Controllers;

Route::post('/cancellation-insights', [Controllers\CancellationInsightController::class, 'store']);
Route::get('/cancellation-reasons', [Controllers\CancellationReasonController::class, 'index']);
