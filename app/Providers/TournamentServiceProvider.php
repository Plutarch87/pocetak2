<?php namespace App\Providers;

use App\Event;
use Illuminate\Support\ServiceProvider;

class TournamentServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->showAllEvents();
    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

    public function showAllEvents()
    {
        view()->composer('partials.allEvents', function ($view) {
            $view->with('events', Event::all()->sortByDesc('created_at'));
        });
    }

}
