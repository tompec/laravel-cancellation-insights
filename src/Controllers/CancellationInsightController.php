<?php

namespace Tompec\CancellationInsights\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Tompec\CancellationInsights\Events\Unsubscribed;
use Tompec\CancellationInsights\Models\CancellationReason;

class CancellationInsightController extends Controller
{
    public function store(Request $request)
    {
        $request = $request->validate([
            'cancellation_reason_id' => 'required|integer|exists:cancellation_reasons,id',
            'comment' => 'nullable',
        ]);

        $reason = CancellationReason::findOrFail($request['cancellation_reason_id']);

        if ($reason->requires_comment && ! isset($request['comment'])) {
            throw ValidationException::withMessages(['comment' => ['A comment is required.']]);
        }

        $cancellation_insight = Auth::user()->causer->cancellations()->create($request);

        Unsubscribed::dispatch(Auth::user()->causer);

        return $cancellation_insight;
    }
}
