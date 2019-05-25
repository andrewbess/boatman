<?php

namespace DreamTeam\Boatman;

use DreamTeam\Boatman\System\Application;
use DreamTeam\Boatman\System\EventManager;

class HumanAbstract
{
    /**
     * @var float
     */
    protected $seat;

    /**
     * @var string
     */
    public $name;

    /**
     * @return float
     */
    public function getSeat()
    {
        return $this->seat;
    }

    public function boardToBoat(Boat $boat)
    {
        /** @var EventManager $eventManager */
        $eventManager = Application::getEventManager();
        /**
         * The event that occurs before boarding
         */
        $eventManager->dispatch(
            'passenger_boarding_before',
            ['boat' => $boat, 'passenger' => $this]
        );
        /**
         * Boarding to boat
         */
        $boat->setPassenger($this);
        /**
         * The event that occurs after boarding
         */
        $eventManager->dispatch(
            'passenger_boarding_after',
            ['boat' => $boat, 'passenger' => $this]
        );
    }
}