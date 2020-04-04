<?php

namespace Tompec\CancellationInsights\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Unsubscribed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $causer;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($causer)
    {
        $this->causer = $causer;
    }
}
