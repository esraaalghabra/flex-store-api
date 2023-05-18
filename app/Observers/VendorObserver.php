<?php

namespace App\Observers;

use App\Models\MainCategory;
use App\Models\Vendor;

class VendorObserver
{
    /**
     * Handle the main category "created" event.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return void
     */
    public function created(Vendor $vendor){
    }

    /**
     * Handle the main category "updated" event.
     *
     * @param  \App\Models\Vendor $vendor
     * @return void
     */
    public function updated(Vendor $vendor){
        $vendor -> products()-> update(['active' => $vendor -> active]);
    }

    /**
     * Handle the main category "deleted" event.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return void
     */
    public function deleted(Vendor $vendor){
    }

    /**
     * Handle the Vendor "restored" event.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return void
     */
    public function restored(Vendor $vendor)
    {
        //
    }

    /**
     * Handle the Vendor "force deleted" event.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return void
     */
    public function forceDeleted(Vendor $vendor)
    {
        //
    }
}
