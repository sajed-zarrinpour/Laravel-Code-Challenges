<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Contracts\Tenant;
use Tenancy\Hooks\Hostname\Contracts\HasHostnames;

use Tenancy\Tenant\Events;

class User extends Authenticatable implements Tenant
{
    use HasApiTokens, HasFactory, Notifiable, AllowsTenantIdentification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * Declaring the event of create, update and delete a tenant (user)
     */
    protected $dispatchesEvents = [
        'created' => \Tenancy\Tenant\Events\Created::class,
        'updated' => \Tenancy\Tenant\Events\Updated::class,
        'deleted' => \Tenancy\Tenant\Events\Deleted::class,
    ];

    /**
     * The attribute of the Model to use for the key.
     *
     * @return string
     */
    public function getTenantKeyName(): string
    {
        // return 'id';
        return 'username';
    }

    /**
     * The actual value of the key for the tenant Model.
     *
     * @return string|int
     */
    public function getTenantKey(): string//int
    {
        // return $this->id;
        return $this->username;
    }

    /**
     * A unique identifier, eg class or table to distinguish this tenant Model.
     *
     * @return string
     */
    // public function getTenantIdentifier(): string
    // {
    //     return get_class($this);
    // }

    /**
     * Returns a Hostname specific to the user(tenant), which is his user name
     */
    // public function getHostnames(): array
    // {
    //     return [
    //         // $this->hostname
    //         $this->username.'.localhost'
    //     ];
    // }
}
