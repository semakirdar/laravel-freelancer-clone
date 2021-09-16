<?php

namespace App\Providers;

use App\Models\Category;

use App\Models\Job;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $job = Job::query()->get();
        $categories = Category::query()->get();
        View::share('categories', $categories);
        View::share('job', $job);
    }
}
