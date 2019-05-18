<?php

namespace DreamTeam\Boatman;

abstract class SeasideAbstract
{
    public static function getPassenger()
    {
        $passenger = reset(static::$passengers);

        if ($passenger === false) {
            throw new \Exception('Не осталось пассажиров');
        }

        return $passenger;
    }

    public static function addPassengers(array $passengers)
    {
        static::$passengers = array_merge(static::$passengers, $passengers);
    }

    public static function setPassenger(HumanAbstract $passenger)
    {
        static::$passengers[] = $passenger;

        return true;
    }

    public static function getPassengers()
    {
        return static::$passengers;
    }
}
