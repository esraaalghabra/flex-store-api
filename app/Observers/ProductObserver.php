<?php

namespace App\Observers;

use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Vendor;

class ProductObserver
{
    /**
     * Handle the main category "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product){

    }

    /**
     * Handle the main category "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {

    }

    /**
     * Handle the main category "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product){
    }

    /**
     * Handle the main category "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product){
    }

    /**
     * Handle the main category "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
