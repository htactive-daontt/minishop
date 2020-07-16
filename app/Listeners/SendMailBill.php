<?php

namespace App\Listeners;

use App\Events\BillEvent;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailOrder;


class SendMailBill
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  BillEvent  $event
     * @return void
     */
    public function handle(BillEvent $event)
    {
        $dataMail = [
            'bill' => $event->bill,
            'name'  => 'Bình đẹp trai, hiih'
        ];

        Mail::to($event->bill->user->email)->send(new SendMailOrder($dataMail));
    }
}
