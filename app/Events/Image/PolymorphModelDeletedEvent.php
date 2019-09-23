<?php

namespace App\Events\Image;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class PolymorphModelDeletedEvent
{
    use Dispatchable, SerializesModels;

    public $polymorphModel;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($polymorphModel)
    {
        $this->polymorphModel = $polymorphModel;
    }

}
