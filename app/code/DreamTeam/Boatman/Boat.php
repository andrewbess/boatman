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

    public function isOverloading()
    {
        return $this->passengersWeight() > static::MAX_SEATS;
    }

    protected function passengersWeight()
    {
        $weight = 0;

        /** @var HumanAbstract $passenger */
        foreach ($this->seats as $passenger) {
            $weight += $passenger->getSeat();
        }

        return $weight;
    }

    public function isFullLoading()
    {
        return $this->passengersWeight() == static::MAX_SEATS;
    }

    public function moveLast()
    {
        array_pop($this->seats);
    }

    public function getFreeSeat()
    {
        return static::MAX_SEATS - $this->passengersWeight();
    }
}