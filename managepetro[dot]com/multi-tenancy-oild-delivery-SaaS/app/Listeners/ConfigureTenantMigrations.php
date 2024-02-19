<?php
namespace App\Listeners;

use Tenancy\Hooks\Migration\Events\ConfigureMigrations;

class ConfigureTenantMigrations
{
    /**
     * add the database/tenant/migrations folder containing migrations that should be used for the Tenant database.
     */
    public function handle(ConfigureMigrations $event)
    {
        $event->path(database_path('tenant/migrations'));
    }
}