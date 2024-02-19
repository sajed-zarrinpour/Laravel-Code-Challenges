<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Tenancy\Affects\Connections\Events\Drivers\Configuring;

class ConfigureTenantConnection
{
    /**
     * Handle the event.
     */
    public function handle(Configuring $event): void
    {
        //
        $event->useConnection('mysql', $event->defaults($event->tenant));
    }
}
