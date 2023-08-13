<?php


namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\viewProduct;
class viewProductListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(viewProduct $event): void
    {
        $product = $event ->product;
        $product ->views = ($product ->views) + 1;
        $product -> save();
    }
}
