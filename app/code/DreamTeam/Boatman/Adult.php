<?php

namespace DreamTeam\Boatman;

class Adult extends HumanAbstract
{
    public function __construct($name, $seat = 1)
    {
        $this->name = $name;
        $this->seat = $seat;
    }
}