<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Profil;
use Illuminate\Support\Carbon;
use App\Models\Pengumuman;
use App\Models\ExternalLink;
use Illuminate\Support\Facades\DB;
use App\Models\Settings as Setting;
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
        // Share data with all views
        $pengumuman = Pengumuman::where('status', '1')
            ->where('tanggal', '>=', Carbon::now()->subMonth())
            ->orderBy('tanggal', 'desc')
            ->take(1)
            ->get();
        
        View::share('pengumuman', $pengumuman);

        $profil = Profil::all(); // atau Profil::all() jika ingin array
        View::share('profil', $profil);
        $externalLinks = ExternalLink::where('status', 1)->get();
        View::share('externalLinks', $externalLinks);
        View::composer('*', function ($view) {
            $today = Carbon::today();
            $thismonth = Carbon::now()->month;
            // dd($today .' & '.$thismonth);

            $totalVisitors = DB::table('visitors')->distinct('ip_address')->count('ip_address');

            $todayVisitors = DB::table('visitors')
                ->whereDate('created_at', $today)
                ->distinct('ip_address')
                ->count('ip_address');

            $thismonthVisitors = DB::table('visitors')
                ->whereMonth('created_at', $thismonth)
                ->distinct('ip_address')
                ->count('ip_address');
            // $thismonthVisitors = DB::table('visitors')
            //     ->whereMonth('created_at', $thismonth)
            //     ->distinct('ip_address')
            //     ->count('ip_address');
            $currentUrl = str_replace(url('/'), '', url()->current());
            $pageViews = DB::table('visitors')->where('url', 'like', '%'.$currentUrl)->count();

            $onlineThreshold = now()->subMinutes(5);
            $onlineVisitors = DB::table('visitors')
                ->where('created_at', '>=', $onlineThreshold)
                ->distinct('ip_address')
                ->count('ip_address');
            $setting = Setting::first();
            $view->with(
            [
                'setting'=> $setting,
                'onlineVisitors' => $onlineVisitors,
                'todayVisitors' => $todayVisitors,
                'totalVisitors' => $totalVisitors,
                'pageViews' => $pageViews,
                'thismonthVisitors' => $thismonthVisitors,
                
            ]);
        });
    }
}
