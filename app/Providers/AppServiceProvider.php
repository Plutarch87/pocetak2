<?php namespace App\Providers;


use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->showAllUsers();
        $this->showAllUsersForAdmin();
    }

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

    public function showAllUsers()
    {
        view()->composer('partials.allUsers', function ($view) {
            $view->with('users', User::all());
        });
    }

    public function showAllUsersForAdmin()
    {
        view()->composer('admin.users.index', function ($view) {
            $view->with('users', User::whereHas('roles', function ($q)
            {
                $q->where('name','!=','Admin');
            })->get());
        });
    }



}
