<?php

namespace App\Livewire\Checkout;
 
use App\Livewire\Forms\AddressForm;
use App\Models\Order;
use App\Services\OrderService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; 
use Livewire\Component;

class Guest extends Component
{
     
    public AddressForm $form;
 
    

    public function render()
    {
        return view('livewire.checkout.guest', ['options' => $this->form->getOptions()]);
    }

    public function save(OrderService $orderService)
    {

        $this->form->validate();

        DB::beginTransaction();
        try {
            $orderService->saveOrder($this->form->all());

            DB::commit();

            
            session(['orderPlaced' => true]);

            return redirect()->route('thank-you');


        } catch (\Exception $e) {
            Log::error($e); 
            DB::rollback();
        }
    }

    public function calculateTax($price)
    {
        // Define the tax rate (12%)
        $taxRate = 12;

        // Calculate the total price
        $totalPrice = $price;

        // Calculate the tax amount
        $taxAmount = ($taxRate / 100) * $totalPrice;

        // Return the tax amount
        return $taxAmount;
    } 
}
