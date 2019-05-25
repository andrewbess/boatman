<?php

namespace DreamTeam\Boatman\System;

/**
 * Class MainObject
 * @package DreamTeam\Boatman\System
 */
class MainObject
{
    /**
     * @var array
     */
    protected $_data = [];

    /**
     * @var array
     */
    static protected $underscoreCache = [];

    /**
     * @param null|array|string $key
     * @return array|bool|mixed
     */
    public function getData($key = null)
    {
        if (null === $key) {
            return $this->_data;
        }

        if (isset($this->_data[$key])) {
            return $this->_data[$key];
        }

        if (is_array($key)) {
            $_result = [];
            foreach ($key as $item) {
                if (isset($this->_data[$item])) {
                    $_result[$item] = $this->_data[$item];
                }
            }

            return $_result;
        }

        return false;
    }

    /**
     * @param string $key
     * @param null|mixed $value
     * @return \DreamTeam\Boatman\System\MainObject
     */
    public function setData($key, $value = null)
    {
        $this->_data[$key] = $value;

        return $this;
    }

    /**
     * @param array $data
     * @return \DreamTeam\Boatman\System\MainObject
     * @throws \Exception
     */
    public function addData($data = [])
    {
        if (!is_array($data)) {
            throw new \Exception('This method required array params');
        }
        $this->_data = array_merge($this->_data, $data);

        return $this;
    }

    /**
     * @param string $key
     * @return \DreamTeam\Boatman\System\MainObject
     */
    public function unsetData($key)
    {
        if (isset($this->_data[$key])) {
            unset($this->_data[$key]);
        }

        return $this;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function hasData($key)
    {
        return isset($this->_data[$key]);
    }

    public function __call($method, $arguments)
    {
        switch (substr($method, 0, 3)) {
            case 'get':
                $key = $this->underscore(substr($method, 3));
                return $this->getData($key);
            case 'set':
                $key = $this->underscore(substr($method, 3));
                return $this->setData($key, $arguments[0]);
            case 'uns':
                $key = $this->underscore(substr($method, 3));
                return $this->unsetData($key);
            case 'has':
                $key = $this->underscore(substr($method, 3));
                return $this->hasData($key);
        }
        throw new \Exception('Method doesn\'n exist in this object.');
    }

    protected function underscore($name)
    {
        if (isset(self::$underscoreCache[$name])) {
            return self::$underscoreCache[$name];
        }
        $result = strtolower(preg_replace('/(.)([A-Z])/', '$1_$2', $name));
        self::$underscoreCache[$name] = $result;

        return $result;
    }
}
