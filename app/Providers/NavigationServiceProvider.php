<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Spatie\Navigation\Facades\Navigation;
use Spatie\Navigation\Navigation as NavigationNavigation;
use Spatie\Navigation\Section;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {

            $r = Route::getCurrentRoute();
            $rr = Route::getRoutes();


            $homeUrl = route('home');
            // ...

            Navigation::make()
                ->add('Home', route('test'))
                ->add('Blog', route('test2'), function (Section $section) {
                    $section
                        ->add('All posts', route('test'))
                        ->add('Topics', route('test2'));
                })
                ->add('Blog2', '', function (Section $section) {
                    $section
                        ->add('All posts', route('test'))
                        ->add('Topics', route('test2'));
                })
                ->addIf(true, 'Hallo', route('home'));
                // ->addIf(true, function (NavigationNavigation $navigation) {
                //     $navigation->add('Admin', route('test'));
                // });
        });
    }
}
