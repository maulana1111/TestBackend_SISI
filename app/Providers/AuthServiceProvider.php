<?php

namespace App\Providers;

use Laravel\Passport\Passport;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::tokensExpireIn(Carbon::now()->addMilli('1296000'));
        // Passport::tokensExpireIn(now()->addMillisecond(1296000));
        // Passport::routes();
        // Passport::loadKeysFrom(__DIR__ . '/../secrets/oauth');
        //
    }
}
