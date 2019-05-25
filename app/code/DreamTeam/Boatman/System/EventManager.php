<?php


namespace DreamTeam\Boatman\System;


class EventManager
{
    protected static $events = [];

    public function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $vendorEventConfigFiles = glob(BP . '/vendor/**/etc/events.json');
        $eventConfigFiles = glob(BP . '/app/code/*/*/etc/events.json');
        $eventConfigFiles = array_merge($eventConfigFiles, $vendorEventConfigFiles);
        foreach ($eventConfigFiles as $eventConfigFile) {
            $eventConfigContent = file_get_contents($eventConfigFile);
            $eventConfig = json_decode($eventConfigContent, true);
            static::$events = array_merge_recursive(static::$events, $eventConfig);
        }

        return true;
    }

    public function dispatch($event, $params = [])
    {
        if (!($observers = $this->getObservers($event))) {
            return false;
        }

        foreach ($observers as $observerName => $observerClass) {
            /**
             * @var ObserverAbstract $observerObject
             */
            $observerObject = new $observerClass;
            $observerObject->getObservableElements()->addData($params);
            $observerObject->execute();
        }

        return true;
    }

    public function getObservers($event)
    {
        if (!count($events = $this->getEvents())) {
            return false;
        }

        if (!count($events[$event])) {
            return false;
        }

        return $events[$event];
    }

    public function getEvents()
    {
        return static::$events;
    }
}