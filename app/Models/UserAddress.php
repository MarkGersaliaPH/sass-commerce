<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'name',
        'contact_no',
        'email',
        'region',
        'city',
        'province',
        'barangay',
        'street',
        'address_line',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function displayAddress()
    {
        return sprintf(
            '%s, %s, Barangay %s, %s %s',
            $this->address_line ?? '',
            $this->street ?? '',
            $this->barangay ?? '',
            $this->city ?? '',
            $this->region ?? ''
        );
    }

}
