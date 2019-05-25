<?php

namespace DreamTeam\Boatman\System;

use DreamTeam\Boatman\Adult;
use DreamTeam\Boatman\Boat;

class Application
{
    protected static $eventManager;
    protected static $boat;

    public static function init()
    {
        /** @var EventManager $eventManager */
        $eventManager = new EventManager();
        static::$eventManager = $eventManager;
        /** @var Boat $boat */
        $boat = new Boat();
        static::$boat = $boat;
    }

    public static function run()
    {
        /** @var Adult $olia */
        $olia = new Adult('Olia');
        $olia->boardToBoat(Application::getBoat());
        $temp = 0;
    }

    public static function getEventManager()
    {
        return static::$eventManager;
    }

    /**
     * @return Boat
     */
    public static function getBoat()
    {
        return static::$boat;
    }
}