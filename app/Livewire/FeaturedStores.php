<?php

namespace App\Livewire;

use Livewire\Component;

class FeaturedStores extends Component
{
    public function render()
    {
        $stores = \App\Models\Store::with(['products'=>function($q){
            return $q->latest();
        }])->get();
        return view('livewire.featured-stores',compact('stores'));
    }
}
