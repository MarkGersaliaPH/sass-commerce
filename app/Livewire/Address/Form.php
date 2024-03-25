<?php

namespace App\Livewire\Address;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Yajra\Address\Controllers\RegionsController;
use Yajra\Address\Entities\Region;

class Form extends Component
{
 

    #[Validate('required')] 
    public $name;
    
    #[Validate('required')] 
    public $contact_no;
    

    public $region_id = 13;
    public $province_id = 1374;
    public $city_id = 137401;

    public $regions = [];
    public $provinces = [];
    public $cities = [];
    public $barangays = [];

    
    public function mount(){    
        $this->regions = \DB::table("regions")->get(); 
        
        $this->provinces = \DB::table("provinces")
        ->where('region_id',$this->region_id)
        ->get();  

        $this->cities = \DB::table("cities")
        ->where('province_id',$this->province_id)
        ->get(); 

        
        $this->barangays = \DB::table("barangays")
        ->where('city_id',$this->city_id)
        ->get(); 

    }



    public function onSelectRegion(){  
        $this->provinces = \DB::table("provinces")
        ->where('region_id',$this->region_id)
        ->get(); 
    }
    public function onSelectProvince(){  
        $this->cities = \DB::table("cities")
        ->where('province_id',$this->province_id)
        ->get(); 
    }
    public function onSelectCity(){  
        $this->barangays = \DB::table("barangays")
        ->where('city_id',$this->city_id)
        ->get(); 
    }

    public function render()
    {
        return view('livewire.address.form');
    }
}
