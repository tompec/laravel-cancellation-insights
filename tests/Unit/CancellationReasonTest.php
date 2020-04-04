<?php

namespace Tompec\CancellationInsights\Tests\Unit;

use Tompec\CancellationInsights\Models\CancellationReason;
use Tompec\CancellationInsights\Tests\TestCase;

class CancellationReasonTest extends TestCase
{
    /** @test */
    public function it_has_a_reason()
    {
        $reason = factory(CancellationReason::class)->create([
            'reason' => 'Too expensive',
        ]);

        $this->assertEquals('Too expensive', $reason->reason);
    }

    /** @test */
    public function it_requires_a_comment()
    {
        $reason = factory(CancellationReason::class)->create([
            'requires_comment' => true,
        ]);

        $this->assertTrue($reason->requires_comment);
    }

    /** @test */
    public function it_has_an_index()
    {
        $reason = factory(CancellationReason::class)->create([
            'index' => 9,
        ]);

        $this->assertEquals(9, $reason->index);
    }

    /** @test */
    public function it_has_an_is_active()
    {
        $reason = factory(CancellationReason::class)->create([
            'is_active' => 0,
        ]);

        $this->assertEquals(0, $reason->is_active);
    }
}
