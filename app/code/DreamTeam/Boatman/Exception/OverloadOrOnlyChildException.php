<?php


namespace DreamTeam\Boatman\Exception;


use Throwable;

class OverloadOrOnlyChildException extends \Exception
{
    public function __construct($message = "Что-то не то!!!", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}