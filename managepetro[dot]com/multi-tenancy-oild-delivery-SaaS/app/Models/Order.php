<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Tenancy\Affects\Connections\Support\Traits\OnTenant;

class Order extends Model
{
    use HasFactory, OnTenant;
}
