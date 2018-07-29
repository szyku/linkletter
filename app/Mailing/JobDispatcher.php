<?php declare(strict_types=1);


namespace App\Mailing;


use App\DispatchJob;
use Carbon\Carbon;
use Spatie\Newsletter\Newsletter;

class JobDispatcher
{
    /** @var Newsletter */
    private $newsletter;

    /** @var DispatchJob */
    private $dispatchJobs;

    /** @var boolean */
    private $dryRun;

    /**
     * JobDispatcher constructor.
     * @param Newsletter $newsletter
     * @param DispatchJob $dispatchJobs
     * @param bool $dryRun If true, no actual dispatch is done.
     */
    public function __construct(Newsletter $newsletter, DispatchJob $dispatchJobs, bool $dryRun = false)
    {
        $this->newsletter = $newsletter;
        $this->dispatchJobs = $dispatchJobs;
        $this->dryRun = $dryRun;
    }

    /**
     * @return int The number of jobs found.
     */
    public function dispatch(): int
    {
        $jobs = $this->dispatchJobs
            ->where('dispatched', false)
            ->where('dispatch_at', '<=', Carbon::now())
            ->get();

        if (!$this->dryRun) {
            foreach ($jobs as $job) {
                $this->executeJob($job);
            }
        }

        return $jobs->count();
    }

    private function executeJob($job)
    {
        // TODO Return to this when details are known
//        $this->newsletter->createCampaign();
    }


}