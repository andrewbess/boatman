<?php

namespace DreamTeam\Boatman;

class LeftSeaside extends SeasideAbstract
{
    protected static $passengers = [];

    /**
     * @return bool
     */
    public static function shufflePassengers()
    {
        shuffle(self::$passengers);

        return true;
    }

    /**
     * @return mixed
     */
    public static function movePassenger()
    {
        $passenger = array_shift(self::$passengers);

        return $passenger;
    }

    /**
     * @return bool
     */
    public static function checkPassengers()
    {
        return (bool) count(self::$passengers);
    }
}