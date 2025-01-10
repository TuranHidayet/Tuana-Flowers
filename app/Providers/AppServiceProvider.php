<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Setting;
use App\Models\User;
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
        view()->composer('admin.*', function ($view) {
            $unreadMessagesCount = Contact::where('status', false)->count();
            $view->with('unreadMessagesCount', $unreadMessagesCount);
        });

        view()->composer('front.*', function ($view) {
            $settings= Setting::first();
            $view->with('settings', $settings);
        });
    }
}
