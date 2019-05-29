<?php

namespace DreamTeam\Boatman\System;

use DreamTeam\Boatman\Adult;
use DreamTeam\Boatman\Boat;
use DreamTeam\Boatman\Exception\OverloadOrOnlyChildException;
use DreamTeam\Boatman\Exception\WrongFirstPassengerException;
use DreamTeam\Boatman\HumanAbstract;
use DreamTeam\Boatman\LeftSeaside;
use DreamTeam\Boatman\RightSeaside;

class Application
{
    protected static $eventManager;
    protected static $boat;

    public static function init($settings)
    {
        /** @var EventManager $eventManager */
        $eventManager = new EventManager();
        static::$eventManager = $eventManager;
        /** @var Boat $boat */
        $boat = new Boat();
        static::$boat = $boat;
        $people = [];
        foreach ($settings as $humanType => $humanNames) {
            $class = "DreamTeam\\Boatman\\" . ucfirst($humanType);
            $humans = explode(',', $humanNames);
            foreach ($humans as $humanName) {
                $people[] = new $class(ucfirst($humanName));
            }
        }
        LeftSeaside::addPassengers($people);
    }

    public static function run()
    {
        LeftSeaside::shufflePassengers();
        $iterator = 0;
        while (!LeftSeaside::isEmpty()) {
            $iterator++;
            echo 'Заход № ' . $iterator . '<br />';
            echo 'На левом берегу ' . count(LeftSeaside::getPassengers()) . ' пассажиров<br />';
            echo 'В лодке ' . count(static::getBoat()->seats) . ' пассажиров<br />';
            echo 'На паравом берегу ' . count(RightSeaside::getPassengers()) . ' пассажиров<br />';
            while (!(static::getBoat()->isFullLoading() || LeftSeaside::isEmpty())) {
                try {
                    /** @var HumanAbstract $passenger */
                    $passenger = LeftSeaside::movePassenger();
                    $passenger->boardToBoat(static::getBoat());
                } catch (WrongFirstPassengerException $exception) {
                    echo $exception->getMessage() . '<br />';
                    LeftSeaside::setPassenger($passenger);
                    LeftSeaside::shufflePassengers();
                } catch (OverloadOrOnlyChildException $exception) {
                    echo $exception->getMessage() . '<br />';
                    LeftSeaside::setPassenger($passenger);
                    LeftSeaside::shufflePassengers();
                }
            }
            echo 'Поехали!!!!<br />';
            RightSeaside::addPassengers(static::getBoat()->landingPassengers());
            echo 'На левом берегу ' . count(LeftSeaside::getPassengers()) . ' пассажиров<br />';
            echo 'В лодке ' . count(static::getBoat()->seats) . ' пассажиров<br />';
            echo 'На паравом берегу ' . count(RightSeaside::getPassengers()) . ' пассажиров<br />';
            echo '<hr />';
        }
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