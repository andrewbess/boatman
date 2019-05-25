<?php

namespace DreamTeam\Boatman\System;

use DreamTeam\Boatman\Api\ObserverInterface;

abstract class ObserverAbstract implements ObserverInterface
{
    /**
     * @var MainObject|null
     */
    protected $observableElements = null;

    /**
     * @return MainObject
     */
    public function getObservableElements()
    {
        if (null === $this->observableElements) {
            $this->observableElements = new MainObject();
        }
        return $this->observableElements;
    }
}