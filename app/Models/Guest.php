<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\HasAddress;

class Guest extends Model
{
    use HasFactory;
    use HasAddress;
}
