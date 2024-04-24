<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'contact_no',
        'email',
        'region',
        'city',
        'province',
        'barangay',
        'street',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
