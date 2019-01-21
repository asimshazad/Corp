<?php

namespace App\Providers;

use App\BasicSetting;
use App\InstalmentTime;
use App\Order;
use App\Section;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $basic = BasicSetting::first();

        /*Config::set('mail.driver','mail');*/
        Config::set('mail.host','smtp.mailtrap.io');
        Config::set('mail.username','a3745e46dbdc10');
        Config::set('mail.password','42bd108412d40e');
        Config::set('mail.port','25');
        Config::set('mail.ENCRYPTION','tls');
        Config::set('mail.from',$basic->email);
        Config::set('mail.name',$basic->title);

        View::share('site_title',$basic->title);
        View::share('basic',$basic);

        $today = Carbon::now()->format('Y-m-d');
        $next = Carbon::parse()->addDays('7')->format('Y-m-d');
        $dueCount = Order::whereStatus(2)->whereBetween('due_payment_date',[$today,$next])->count();

        $today1 = Carbon::now()->format('Y-m-d').' 00:00:00';
        $next1 = Carbon::parse()->addMonth()->format('Y-m-d').' 23:59:59';
        $instalmentCount = InstalmentTime::whereStatus(0)->whereBetween('pay_date',[$today1,$next1])->count();

        View::share('dueCount',$dueCount);
        View::share('instalmentCount',$instalmentCount);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
