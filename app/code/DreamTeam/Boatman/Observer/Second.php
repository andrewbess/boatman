<?php

namespace DreamTeam\Boatman\Observer;

use DreamTeam\Boatman\System\ObserverAbstract;

class Second extends ObserverAbstract
{
    public function execute()
    {
        $passenger = $this->getObservableElements()->getPassenger();
        $boat = $this->getObservableElements()->getBoat();
        $temp = 0;
    }
}