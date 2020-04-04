<?php

namespace Tompec\CancellationInsights\Tests\Feature;

use Tompec\CancellationInsights\Models\CancellationReason;
use Tompec\CancellationInsights\Tests\TestCase;

class CancellationReasonControllerTest extends TestCase
{
    /** @test **/
    public function the_index_is_available()
    {
        factory(CancellationReason::class)->create(['index' => 2]);
        factory(CancellationReason::class)->create(['index' => 1]);
        factory(CancellationReason::class)->create(['index' => 3, 'is_active' => 0]);

        $response = $this->getJson('/cancellation-reasons');

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => 2,
                        'reason' => 'Too expensive',
                        'requires_comment' => 0,
                        'index' => 1,
                    ],
                    [
                        'id' => 1,
                        'reason' => 'Too expensive',
                        'requires_comment' => 0,
                        'index' => 2,
                    ],
                ],
            ]);
    }
}
