<?php

namespace Tompec\CancellationInsights;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tompec\CancellationInsights\Skeleton\SkeletonClass
 */
class CancellationInsightsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cancellation-insights';
    }
}
