<?php

namespace DreamTeam\Boatman\Observer;

use DreamTeam\Boatman\Boat;
use DreamTeam\Boatman\Exception\WrongFirstPassengerException;
use DreamTeam\Boatman\HumanAbstract;
use DreamTeam\Boatman\System\ObserverAbstract;

class BeforeBoarding extends ObserverAbstract
{
    public function execute()
    {
        /** @var HumanAbstract $passenger */
        $passenger = $this->getObservableElements()->getPassenger();
        /** @var Boat $boat */
        $boat = $this->getObservableElements()->getBoat();

        if (!$boat->checkPassengers() && $passenger->getSeat() < 1) {
            throw new WrongFirstPassengerException();
        }
    }
}