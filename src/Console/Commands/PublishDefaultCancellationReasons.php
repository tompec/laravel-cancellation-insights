<?php

namespace Tompec\CancellationInsights\Console\Commands;

use Illuminate\Console\Command;
use Tompec\CancellationInsights\Models\CancellationReason;

class PublishDefaultCancellationReasons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancellations:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the default cancellation reasons';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        CancellationReason::firstOrCreate(['reason' => 'Too expensive', 'index' => 1]);
        CancellationReason::firstOrCreate(['reason' => 'Missing features I need', 'index' => 2]);
        CancellationReason::firstOrCreate(['reason' => 'Switching to another product', 'index' => 3]);
        CancellationReason::firstOrCreate(['reason' => 'Technical issues', 'index' => 4]);
        CancellationReason::firstOrCreate(['reason' => 'Other', 'index' => 5]);
    }
}
