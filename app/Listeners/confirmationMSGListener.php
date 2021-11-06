<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Twilio\Rest\Client;
class confirmationMSGListener
{
    /**
     * Create the event listener.
     * 
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_TOKEN' );
       $client = new Client( $sid, $token );
      //  // In production, these should be environment variables. E.g.:

       $message="This is Your Confirmation Code ".$event->randomNumber;
       // A Twilio number you own with SMS capabilities
       $client->messages->create(
         $event->phone,
          [
              'from' => env( 'TWILIO_FROM' ),
              'body' => $message,
          ]
      );
    }
}
