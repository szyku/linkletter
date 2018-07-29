<?php

namespace App\Console\Commands;

use App\Mailing\JobDispatcher;
use Illuminate\Console\Command;
use Illuminate\Log\Logger;
use Symfony\Component\Console\Output\OutputInterface;

class DispatchJobs extends Command
{
    private const VERBOSITY = 1;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'linkletter:dispatch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will look for any dispatch jobs which are scheduled and execute.';

    /** @var JobDispatcher */
    private $dispatcher;

    /** @var Logger */
    private $logger;

    /**
     * Create a new command instance.
     *
     * @param JobDispatcher $dispatcher
     * @param Logger $logger
     */

    public function __construct(JobDispatcher $dispatcher, Logger $logger)
    {
        $this->dispatcher = $dispatcher;
        $this->logger = $logger;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $jobCount = $this->dispatcher->dispatch();
        $this->logger->info(sprintf('Dispatched %s jobs', $jobCount));
        $this->info("Dispatched successfully $jobCount jobs.", OutputInterface::VERBOSITY_VERBOSE);
    }
}
