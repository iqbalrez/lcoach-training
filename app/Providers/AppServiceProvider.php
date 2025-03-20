<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CaseStudiesInterface;
use App\Interfaces\MeetingRequestInterface;
use App\Interfaces\PartnerInterface;
use App\Interfaces\ServicesInterface;
use App\Interfaces\SocialMediaInterface;
use App\Interfaces\StatisticInterface;
use App\Interfaces\WebConfigInterface;
use App\Repositories\CaseStudiesRepository;
use App\Repositories\MeetingRequestRepository;
use App\Repositories\PartnerRepository;
use App\Repositories\ServicesRepository;
use App\Repositories\SocialMediaRepository;
use App\Repositories\StatisticRepository;
use App\Repositories\WebConfigRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CaseStudiesInterface::class, CaseStudiesRepository::class);
        $this->app->bind(MeetingRequestInterface::class, MeetingRequestRepository::class);
        $this->app->bind(PartnerInterface::class, PartnerRepository::class);
        $this->app->bind(ServicesInterface::class, ServicesRepository::class);
        $this->app->bind(SocialMediaInterface::class, SocialMediaRepository::class);
        $this->app->bind(StatisticInterface::class, StatisticRepository::class);
        $this->app->bind(WebConfigInterface::class, WebConfigRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
