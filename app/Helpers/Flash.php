<?php
namespace App\Helpers;

class Flash
{
    public static function add($message, $type = 'success', $timeout = 5000)
    {
        session()->push('flashes', [$message, $type, $timeout]);
    }
}
?>
