<?php

namespace Tompec\CancellationInsights\Tests;

use Orchestra\Testbench\TestCase;
use Tompec\CancellationInsights\CancellationInsightsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [CancellationInsightsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
