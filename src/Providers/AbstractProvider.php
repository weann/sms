<?php

namespace Sms\Providers;

use GuzzleHttp\Client;
use Sms\Contracts\Provider as ProviderContract;

abstract class AbstractProvider implements ProviderContract
{
    protected $config;
    protected $guzzle;

    protected $httpClient;

    public function __construct($config, $guzzle)
    {
        $this->config = $config;
        $this->guzzle = $guzzle;
    }

    abstract public function send($to, $message);

    protected function getHttpClient()
    {
        if (is_null($this->httpClient)) {
            $this->httpClient = new Client($this->guzzle);
        }

        return $this->httpClient;
    }
}
