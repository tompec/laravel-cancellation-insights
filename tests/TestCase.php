<?php

namespace Tompec\CancellationInsights\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories('./database/factories');

        $this->loadLaravelMigrations();

        $this->artisan('migrate')->run();
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('cancellation-insights.causer_model', 'Tompec\CancellationInsights\Tests\User');
    }

    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Tompec\CancellationInsights\CancellationInsightsServiceProvider::class,
        ];
    }
}
