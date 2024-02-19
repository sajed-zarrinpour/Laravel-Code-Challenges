<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;


use Tenancy\Hooks\Database\Events\Drivers\Configuring as DatabaseConfigEvent;

use Tenancy\Affects\Connections\Events\Resolving;
use App\Listeners\ResolveTenantConnection;
use Tenancy\Affects\Connections\Events\Drivers\Configuring as ConnectionConfigEvent;
use App\Listeners\ConfigureTenantConnection;
use App\Listeners\ConfigureTenantDatabase;

use Tenancy\Hooks\Migration\Events\ConfigureMigrations;
use App\Listeners\ConfigureTenantMigrations;


/** model related events */
use Tenancy\Affects\Models\Events\ConfigureModels;
use App\Listeners\ModelRelatedEvents\ConfigureTenantModels;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        /**  configuring database connection when creating tenant’s database. */
        DatabaseConfigEvent::class => [
            ConfigureTenantDatabase::class
        ],
        /** set up the connection that Laravel use */
        Resolving::class => [
            ResolveTenantConnection::class
        ],
        
        ConnectionConfigEvent::class => [
            ConfigureTenantConnection::class
        ],

        ConfigureMigrations::class => [
            ConfigureTenantMigrations::class,
        ],

        ConfigureModels::class => [
            ConfigureTenantModels::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
