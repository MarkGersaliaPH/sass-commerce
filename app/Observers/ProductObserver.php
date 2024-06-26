<?php

namespace App\Observers;

use App\Models\Product;
use Filament\Facades\Filament;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function creating(Product $product): void
    {
        //
        // $product->store_id = Filament::getTenant()->id;
        $product->created_by_id = auth()->id();
        // $product->price = $product->price / 100;
    }

    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
