<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Yajra\Address\HasAddress;

class Guest extends Model
{
    use HasAddress;
    use HasFactory;

    protected $fillable = ['email', 'name', 'contact_no'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
