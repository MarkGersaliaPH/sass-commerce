<?php

namespace App\Livewire;

use App\Livewire\Forms\AddressForm;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Checkout extends Component
{
    public AddressForm $form;

    public CustomerForm $customer;

    public function save(OrderService $orderService)
    {
        $this->form->validate();

        // Execution doesn't reach here if validation fails.

        DB::beginTransaction();
        try {
            $orderService->saveOrder($this->form);

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
