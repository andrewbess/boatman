<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
const BP = __DIR__;

use DreamTeam\Boatman\System\Application;

Application::init($_GET);
Application::run();