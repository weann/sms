<?php

namespace Sms;

class Sms
{
    protected $config;
    protected $drivers = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function driver($driver)
    {
        if (! isset($this->drivers[$driver])) {
            $this->drivers[$driver] = $this->createDriver($driver);
        }

        return $this->drivers[$driver];
    }

    protected function createDriver($driver)
    {
        $class = 'Sms\\Providers\\'.ucfirst($driver).'Provider';
        $guzzle = $this->config['guzzle'] ?? [];

        return new $class($this->config[$driver], $guzzle);
    }
}
