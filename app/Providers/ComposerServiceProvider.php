<?php

namespace Picnook\Providers;

use Illuminate\Support\ServiceProvider;
use Picnook\Pic;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        #make user available to all views
        \View::composer('*', function($view){
            $view->with('user', \Auth::user())->with('allpics', Pic::All());
        });
        //\View::composer('*', function($view))
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
}
