<?php

namespace Tompec\CancellationInsights\Tests\Feature\Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Tompec\CancellationInsights\Tests\TestCase;

class PublishDefaultCancellationReasonsTest extends TestCase
{
    /** @test */
    public function default_cancellation_reasons_can_be_generated()
    {
        Artisan::call('cancellations:publish');

        $this->assertDatabaseHas('cancellation_reasons', ['reason' => 'Too expensive']);
        $this->assertDatabaseHas('cancellation_reasons', ['reason' => 'Missing features I need']);
        $this->assertDatabaseHas('cancellation_reasons', ['reason' => 'Switching to another product']);
        $this->assertDatabaseHas('cancellation_reasons', ['reason' => 'Technical issues']);
        $this->assertDatabaseHas('cancellation_reasons', ['reason' => 'Other']);
    }
}
