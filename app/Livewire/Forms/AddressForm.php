<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AddressForm extends Form
{
    //

    public $region = 'National Capital Region (NCR)';

    public $province = 'NCR, Second District (Not a Province)';

    public $city = 'City of Mandaluyong';

    public $address;

    #[Validate('required')]
    public $barangay;

    #[Validate('required')]
    public $street;

    public $email;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $contact_no;

    public $regions = [];

    public $provinces = [];

    public $cities = [];

    public $barangays = [];

    public function getOptions()
    {

        // public $region_id = 13;
        // public $province_id = 1374;
        // public $city_id = 137401;

        $regions = \DB::table('regions')->get();
        $data['regions'] = $regions;

        $data['provinces'] = \DB::table('provinces')
            ->where('name', $this->province)
            ->get();

        $city = \DB::table('cities')
            ->where('name', $this->city)
            ->get();

        $data['cities'] = $city;

        $data['barangays'] = \DB::table('barangays')
            ->where('city_id', 137401)
            ->get();

        return $data;
    }

    public function save($order)
    {
        $order->shipping_details()->create($this->all());
    }
}
