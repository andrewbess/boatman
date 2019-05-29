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

    public static function isOnlyChild()
    {
        if (!count(static::getPassengers())) {
            return false;
        }

        /** @var HumanAbstract $passenger */
        foreach (static::$passengers as $passenger) {
            if ($passenger->getSeat() == 1) {
                return false;
            }
        }

        return true;
    }

    public static function isEmpty()
    {
        return !count(static::getPassengers());
    }

    public static function getPassengersWeight()
    {
        $weight = 0;

        /** @var HumanAbstract $passenger */
        foreach (static::$passengers as $passenger) {
            $weight += $passenger->getSeat();
        }

        return $weight;
    }
}