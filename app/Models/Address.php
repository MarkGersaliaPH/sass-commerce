<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Yajra\Address\Entities\Barangay;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\Region;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'contact_no',
        'region_id',
        'city_id',
        'province_id',
        'barangay_id',
        'street',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'model_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(config('address.model.region', Region::class), 'region_id', 'region_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Province>
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(config('address.model.province', Province::class), 'province_id', 'province_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<City>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(config('address.model.city', City::class), 'city_id', 'city_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Barangay>
     */
    public function barangay(): BelongsTo
    {
        return $this->belongsTo(config('address.model.barangay', Barangay::class), 'barangay_id', 'code')->withDefault();
    }
}
