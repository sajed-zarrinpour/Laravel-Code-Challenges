<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Tenancy\Affects\Connections\Support\Traits\OnTenant;

class Customer extends Model
{
    use HasFactory, OnTenant;
}
