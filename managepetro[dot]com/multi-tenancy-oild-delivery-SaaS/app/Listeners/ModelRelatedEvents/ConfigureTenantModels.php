<?php

namespace App\Listeners\ModelRelatedEvents;

use Vendor\Package\Models\Permission;
use Tenancy\Affects\Models\Events\ConfigureModels;
use Tenancy\Facades\Tenancy;

class ConfigureTenantModels
{
    protected $model = Permission::class;

    public function handle(ConfigureModels $event)
    {
        if($event->event->tenant)
        {
            $event->setConnection(
                $this->model,
                Tenancy::getTenantConnectionName()
            );
        }
    }
}