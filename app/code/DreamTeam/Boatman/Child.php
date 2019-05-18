<?php

namespace DreamTeam\Boatman;

class Child extends HumanAbstract
{
    public function __construct($name, $seat = 0.5)
    {
        $this->name = $name;
        $this->seat = $seat;
    }
}