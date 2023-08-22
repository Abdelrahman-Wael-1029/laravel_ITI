<?php


namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\viewProduct;
use Illuminate\Support\Facades\Session;

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
        $product = $event->product;
        if (session::has("viewed.$product->id")) {
            return;
        }
        session::put("viewed.$product->id", time());
        $product->views = ($product->views) + 1;
        $product->save();
    }
}
