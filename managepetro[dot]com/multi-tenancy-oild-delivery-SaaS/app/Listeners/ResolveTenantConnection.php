<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Tenancy\Identification\Contracts\Tenant;
use Tenancy\Affects\Connections\Events\Resolving;
use Tenancy\Affects\Connections\Events\Drivers\Configuring;
use Tenancy\Affects\Connections\Contracts\ProvidesConfiguration;

class ResolveTenantConnection implements ProvidesConfiguration
{
    /**
     * Handle the event.
     */
    public function handle(Resolving $event): ResolveTenantConnection
    {
        //
        return $this;
    }

    public function configure(Tenant $tenant): array {
        $config = [];
        event(new Configuring($tenant, $config, $this));
        return $config;
     }
}
