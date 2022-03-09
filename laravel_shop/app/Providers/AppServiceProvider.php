<?php

namespace App\Providers;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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

    // public function boot()
    // {
    //     View::share('greeting', ' Hello mn tôi là giang năm nay tôi 21 tuổi tôi đến từ Ba Vì hà Nội');
    // }

    public function boot()
    {
        // Using class based composers...
        View::composer('profile', ProfileComposer::class);

        // Using closure based composers...
        View::composer('/composer', function ($view) {
            echo "Giang Cá Khô 2K Đến Từ Ba Vì !!!";
        });
        Paginator::defaultView('includes.pagination');
    }
}
