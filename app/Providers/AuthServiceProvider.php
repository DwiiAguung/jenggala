<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\KatalogPesanan' => 'App\Policies\KatalogPesananPolicy',
        'App\Models\Pesanan' => 'App\Policies\TransaksiPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Otorisasi Admin
        Gate::define('admin', function (User $user) {
            return $user->role == 'Admin';
            // return auth()->user()->role === 'Admin';
        });

        // Otorisasi Barista
        Gate::define('barista', function (User $user) {
            return $user->role == 'Barista';
            // return auth()->user()->role === 'Barista';
        });
    }
}
