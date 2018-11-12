<?php

namespace Modules\Employee\Providers;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Employee\Entities\Attendance;
use Modules\Employee\Entities\Employee;

class EmployeeServiceProvider extends ServiceProvider
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

        // All Employee Show

        View::composer('employee::all-employee', function ($view) {
            $allEmployee = Employee::leftjoin('users', 'employees.user_id', '=', 'users.id')
                ->orderby('employees.created_at', 'desc')
                ->get(['employees.*', 'users.first_name', 'users.last_name', 'users.email']);
            $view->with('allEmployee', $allEmployee);
        });


        // For Add Employee

        View::composer('employee::all-employee', function ($view) {
            $pendingEmployee = User::whereNotIn('id', [DB::raw('select user_id from employees')])
                ->orderBy('created_at', 'desc')
                ->get(['id', 'email', 'first_name', 'last_name']);
            $view->with('pendingEmployee', $pendingEmployee);
        });


        // All Employee Attendance Show

        View::composer('employee::employee-attendance', function ($view) {
            $empAttendance = Attendance::whereMonth('created_at', '=', Carbon::now()->month)
                // ->whereTime('entry_time', '<=' ,'14:00:00')
                ->where('exit_time', '!=', null)
                ->select('employee_id', DB::raw('count(*) as total'))
                ->groupBy('employee_id')
                ->get();
            $view->with('empAttendance', $empAttendance);
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
            __DIR__ . '/../Config/config.php' => config_path('employee.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'employee'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/employee');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/employee';
        }, \Config::get('view.paths')), [$sourcePath]), 'employee');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/employee');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'employee');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'employee');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production')) {
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
