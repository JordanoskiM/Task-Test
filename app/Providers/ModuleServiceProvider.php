<?php

namespace App\Providers;

use App\Modules\PostModule\IPostManagement;
use App\Modules\PostModule\PostManagement;
use App\Modules\WebsiteModule\ISubscribeManagement;
use App\Modules\WebsiteModule\IWebsiteManagement;
use App\Modules\WebsiteModule\SubscribeManagement;
use App\Modules\WebsiteModule\WebsiteManagement;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
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
        $this->app->bind(IWebsiteManagement::class, WebsiteManagement::class);
        $this->app->bind(IPostManagement::class, PostManagement::class);
        $this->app->bind(ISubscribeManagement::class, SubscribeManagement::class);
    }
}
