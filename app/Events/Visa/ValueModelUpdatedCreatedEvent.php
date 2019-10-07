<?php

namespace App\Events\Visa;

use App\Models\Visa\Value;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ValueModelUpdatedCreatedEvent
{
    use Dispatchable, SerializesModels;

    public $value;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Value $value)
    {
        $this->value = $value;
    }

}
