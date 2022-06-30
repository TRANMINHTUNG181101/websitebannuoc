<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\StaticSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        //
        Paginator::useBootstrap();
        $options = StaticSetting::first();
        if ($options) {
            View::share('setting', json_decode($options->options));
        }

        $all = Order::whereNotNull('trangthai')->count();
        $receive = Order::where('trangthai', 1)->count();
        $process = Order::whereNotIn('trangthai', [1, 4, -1])->count();
        $success = Order::where('trangthai', 4)->count();
        $cancel = Order::where('trangthai', -1)->count();
        $viewData = [
            'all' => $all,
            'receive' => $receive,
            'process' => $process,
            'cancel' => $cancel,
            'success' => $success
        ];

        View::share($viewData);
    }
}