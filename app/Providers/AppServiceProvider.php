<?php

namespace App\Providers;

use App\DispatchJob;
use App\Mailing\JobDispatcher;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Spatie\Newsletter\Newsletter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(JobDispatcher::class, function (Application $app){
            $newsletter = $app->make(Newsletter::class);
            $jobs = $app->make(DispatchJob::class);
            $dryRun = ! $app['config']->get('app.enable_newsletter');

            return new JobDispatcher($newsletter, $jobs, $dryRun);
        });
    }
}
