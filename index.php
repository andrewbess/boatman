<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
//const BP = __DIR__;

use DreamTeam\Boatman\LeftSeaside;
use DreamTeam\Boatman\Adult;
use DreamTeam\Boatman\Child;

LeftSeaside::setPassenger(new Adult('Dima'));
LeftSeaside::setPassenger(new Adult('Olia'));
LeftSeaside::setPassenger(new Child('Ivan'));
LeftSeaside::setPassenger(new Child('Kolia'));
LeftSeaside::setPassenger(new Child('Andrii'));




echo '<pre>';
var_dump(LeftSeaside::getPassengers());
var_dump(\DreamTeam\Boatman\RightSeaside::getPassengers());
echo '</pre>';
die();




$boat = new DreamTeam\Boatman\Boat();

$test = new Test\Test\Test();

$event = new Symfony\Component\EventDispatcher\Event();

$temp = 0;