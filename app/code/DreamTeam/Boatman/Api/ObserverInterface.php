<?php

namespace DreamTeam\Boatman\Api;

interface ObserverInterface
{
    public function execute();

    public function getObservableElements();
}