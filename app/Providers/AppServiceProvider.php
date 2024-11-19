<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            View::share('authUser', Auth::user());
        }

        // Chia sẻ danh mục
        View::share('danhMucs', DanhMuc::take(5)->get());
    }
}
