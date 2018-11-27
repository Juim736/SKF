<?php

namespace Modules\Account\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Account\Entities\OfficeAccount;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');


        View::composer(['account::account','account::daily_account'], function ($view) {
            $today =  Carbon::today();
            $lastSevenDay =  Carbon::today()->subDays(7);
            $firstDayOfMonth = Carbon::now()->startOfMonth();
            $allCostData = DB::select('SELECT * FROM (
                        SELECT SUM(cost_amount) as amount FROM office_accounts WHERE created_at > "'.$today.'"
                         UNION All SELECT SUM(cost_amount) as amount FROM office_accounts   WHERE created_at > "'.$lastSevenDay.'" 
                         UNION ALL SELECT SUM(cost_amount) as amount FROM office_accounts WHERE created_at > "'.$firstDayOfMonth.'" ) as demo_table');
            $todayData = OfficeAccount::whereDate('created_at',$today)->orderby('created_at','desc')->get();
            $weekData = OfficeAccount::whereDate('created_at','>',$lastSevenDay)->orderby('created_at','desc')->get();
            $monthData = OfficeAccount::whereDate('created_at','>',$firstDayOfMonth)->orderby('created_at','desc')->get();
            $view->with(compact('todayData','allCostData','weekData','monthData','firstDayOfMonth'));
        });

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('account.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'account'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/account');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/account';
        }, \Config::get('view.paths')), [$sourcePath]), 'account');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/account');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'account');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'account');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
