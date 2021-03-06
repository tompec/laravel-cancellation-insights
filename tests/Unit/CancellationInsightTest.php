<?php

namespace Tompec\CancellationInsights\Tests\Unit;

use Tompec\CancellationInsights\Models\CancellationInsight;
use Tompec\CancellationInsights\Models\CancellationReason;
use Tompec\CancellationInsights\Tests\TestCase;
use Tompec\CancellationInsights\Tests\User;

class CancellationInsightTest extends TestCase
{
    /** @test **/
    public function it_belongs_to_a_causer()
    {
        $user = factory(User::class)->create();

        $insight = factory(CancellationInsight::class)->create([
            'causer_id' => $user->id,
            'causer_type' => config('cancellation-insights.causer_model'),
            'cancellation_reason_id' => 1,
        ]);

        $this->assertInstanceOf(config('cancellation-insights.causer_model'), $insight->causer);
        $this->assertEquals($user->id, $insight->causer->id);
    }

    /** @test **/
    public function it_belongs_to_a_reason()
    {
        $reason = factory(CancellationReason::class)->create();

        $insight = factory(CancellationInsight::class)->create([
            'cancellation_reason_id' => $reason->id,
        ]);

        $this->assertInstanceOf(CancellationReason::class, $insight->reason);
        $this->assertEquals($reason->id, $insight->reason->id);
    }
}
