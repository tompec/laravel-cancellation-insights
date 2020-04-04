<?php

namespace Tompec\CancellationInsights\Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Tompec\CancellationInsights\Events\Unsubscribed;
use Tompec\CancellationInsights\Models\CancellationReason;
use Tompec\CancellationInsights\Tests\TestCase;
use Tompec\CancellationInsights\Tests\User;

class CancellationInsightControllerTest extends TestCase
{
    /** @test */
    public function a_cancellation_can_be_stored()
    {
        $this->withoutExceptionHandling();

        Event::fake();

        $reason = factory(CancellationReason::class)->create();

        $user = factory(User::class)->create();

        Auth::login($user);

        $response = $this->postJson('/cancellations-insights', [
            'cancellation_reason_id' => $reason->id,
        ]);

        $response->assertStatus(201);

        Event::assertDispatched(Unsubscribed::class, function ($event) use ($user) {
            return $event->causer->id === $user->id;
        });

        $this->assertEquals(1, $user->cancellations->count());
    }

    /** @test */
    public function a_comment_is_mandatory_when_the_reason_requires_it()
    {
        $this->withoutExceptionHandling();

        $reason = factory(CancellationReason::class)->create(['requires_comment' => true]);

        $user = factory(User::class)->create();

        Auth::login($user);

        $response = $this->postJson('/cancellations-insights', [
            'cancellation_reason_id' => $reason->id,
            'comment' => 'lorem ipsum',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('cancellation_insights', [
            'causer_id' => $user->id,
            'cancellation_reason_id' => 1,
            'comment' => 'lorem ipsum',
        ]);
    }

    /** @test */
    public function a_cancellation_returns_a_422_if_no_comment_is_provided_when_it_is_required()
    {
        $reason = factory(CancellationReason::class)->create(['requires_comment' => true]);

        Auth::login(factory(User::class)->create());

        $response = $this->postJson('/cancellations-insights', [
            'cancellation_reason_id' => $reason->id,
        ]);

        $response->assertStatus(422);
    }
}
