<?php

namespace App\Providers;

use App\Models\Notif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user_id = Auth::id();
                $notif_count = Notif::where('user_id', $user_id)->where('status',0)->count();
                $view->with('notif_count', $notif_count);
            }
        });
    }
}
