<?php

namespace DreamTeam\Boatman;

class Boat
{
    const MAX_SEATS = 2;

    public $seats = [];

    public function setPassenger(HumanAbstract $passenger)
    {
        $this->seats[] = $passenger;

        return $this;
    }

    public function landingPassengers()
    {
        $passengers = $this->seats;
        $this->seats = [];

        return $passengers;
    }

    public function checkPassengers()
    {
        return (bool) count($this->seats);
    }
}