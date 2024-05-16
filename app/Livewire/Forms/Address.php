<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Address extends Form
{
    public $regions;

    public $provinces = [];

    public $cities = [];

    public $barangays = [];

    public $region_id = 13;

    public $province_id = 1374;

    public $city_id = 137401;

    #[Validate('required')]
    public $barangay_id;

    #[Validate('required')]
    public $street;


    public function onSelectRegion()
    {
        $this->provinces = \DB::table('provinces')
            ->where('region_id', $this->region_id)
            ->get();
    }

    public function onSelectProvince()
    {
        $this->cities = \DB::table('cities')
            ->where('province_id', $this->province_id)
            ->get();
    }

    public function onSelectCity()
    {
        $this->barangays = \DB::table('barangays')
            ->where('city_id', $this->city_id)
            ->get();
    }

    public function render()
    {
        $this->validate();

        return view('livewire.address.form');
    }
}
