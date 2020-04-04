<?php

namespace Tompec\CancellationInsights\Controllers;

use Illuminate\Routing\Controller;
use Tompec\CancellationInsights\Models\CancellationReason;
use Tompec\CancellationInsights\Resources\CancellationReason as CancellationReasonResource;

class CancellationReasonController extends Controller
{
    public function index()
    {
        return CancellationReasonResource::collection(
            CancellationReason::active()->orderBy('index')->get()
        );
    }
}
