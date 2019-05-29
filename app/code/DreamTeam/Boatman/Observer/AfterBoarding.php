<?php

namespace DreamTeam\Boatman\Observer;

use DreamTeam\Boatman\Boat;
use DreamTeam\Boatman\Exception\OverloadOrOnlyChildException;
use DreamTeam\Boatman\LeftSeaside;
use DreamTeam\Boatman\System\ObserverAbstract;

class AfterBoarding extends ObserverAbstract
{
    public function execute()
    {
        /** @var Boat $boat */
        $boat = $this->getObservableElements()->getBoat();

        if ($boat->isOverloading()) {
            $boat->moveLast();
            throw new OverloadOrOnlyChildException();
        }

        if ($boat->getFreeSeat() < LeftSeaside::getPassengersWeight() && LeftSeaside::isOnlyChild()) {
            $boat->moveLast();
            throw new OverloadOrOnlyChildException();
        }
    }
}