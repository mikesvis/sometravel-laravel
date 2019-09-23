<?php

namespace App\Listeners\Image;

use App\Events\Image\PolymorphModelDeletedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteImagesListener
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
     * @param  App\Events\Image\PolymorphModelDeletedEvent  $event
     * @return void
     */
    public function handle(PolymorphModelDeletedEvent $event)
    {
        if(isset($event->polymorphModel->images)){
            foreach ($event->polymorphModel->images as $image) {
                $image->delete();
            }
        }
    }
}
