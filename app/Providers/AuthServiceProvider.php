<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Artikel' => 'App\Policies\ArtikelPolicy',
        'App\Models\Video' => 'App\Policies\VideoPolicy',
        'App\Models\KomentArtikel' => 'App\Policies\KomentArtikelPolicy',
        'App\Models\DoaHadist' => 'App\Policies\DoaHadistPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            return $user->king() ? 'true' : null;
        });
    }
}
