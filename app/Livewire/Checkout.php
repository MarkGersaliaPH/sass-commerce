<?php

namespace App\Livewire;

use App\Livewire\Forms\AddressForm;
use App\Models\UserAddress;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On; 

class Checkout extends Component
{
    public AddressForm $form;
  
    
    public $shippingDetailOptions =[];

    public function mount(){ 
        $this->shippingDetailOptions = UserAddress::where('user_id',auth()->id())->get();
    }

    public $user_address_id;


    public function save(OrderService $orderService)
    { 

        // Execution doesn't reach here if validation fails.

        DB::beginTransaction();
        try {

            $addressData = UserAddress::find($this->user_address_id);
            $orderService->saveOrder($addressData->toArray());

            DB::commit();

            return redirect('/');
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    public function render()
    {
        return view('livewire.checkout', ['options' => $this->form->getOptions()]);
    }
}
