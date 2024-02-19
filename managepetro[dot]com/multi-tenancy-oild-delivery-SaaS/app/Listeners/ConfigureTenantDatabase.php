<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Tenancy\Hooks\Database\Events\Drivers\Configuring;

class ConfigureTenantDatabase
{
    /**
     * Handle the event.
     */
    public function handle(Configuring $event)
    {
        //
        $event->useConnection('mysql', $event->defaults($event->tenant));
    }
}
