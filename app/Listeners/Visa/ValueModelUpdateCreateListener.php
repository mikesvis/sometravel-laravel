<?php

namespace App\Listeners\Visa;

use App\Events\Visa\ValueModelUpdatedCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ValueModelUpdateCreateListener
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
     * @param  ValueModelUpdatedCreatedEvent  $event
     * @return void
     */
    public function handle(ValueModelUpdatedCreatedEvent $event)
    {
        if((bool)$event->value->is_default == true){
            $event->value->parameter->values()
                ->where('id', '<>', $event->value->id)
                ->where('parameter_id', $event->value->parameter_id)
                ->where('is_default', 1)
                ->update(['is_default' => 0]);
        }
    }
}
