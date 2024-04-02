<?php

namespace App\Livewire\Forms;

use App\Models\Address;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddressForm extends Form
{
    //

    public $region_id = 13;
    public $province_id = 1374;
    public $city_id = 137401;


    #[Validate('required')]
    public $barangay_id;


    #[Validate('required')]
    public $street;

    public $regions = [];
    public $provinces = [];
    public $cities = [];
    public $barangays = [];


    public function getOptions()
    {
        $data['regions'] = \DB::table("regions")->get();

        $data['provinces'] = \DB::table("provinces")
            ->where('region_id', $this->region_id)
            ->get();

        $data['cities'] = \DB::table("cities")
            ->where('province_id', $this->province_id)
            ->get();


        $data['barangays'] = \DB::table("barangays")
            ->where('city_id', $this->city_id)
            ->get();


        return  $data;
    }



    public function save($order_id)
    {
        $address = new Address;
        $address->model_id = $order_id;
        $address->model_type = Address::class;
        $address->fill($this->all());
        $address->save();
    }
}
