<?php

namespace DreamTeam\Boatman;

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
}