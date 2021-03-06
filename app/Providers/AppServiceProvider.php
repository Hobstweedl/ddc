<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Set up morph map
        Relation::morphMap([
            'address'  => Address::class,
            'location' => Location::class,
            'phone' => Phone::class,
            'note' => Note::class,
            'howdidyouhear' => HowDidYouHear::class,
            'family' => Family::class
        ]);
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
