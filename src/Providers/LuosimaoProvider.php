<?php

namespace Sms\Providers;

class LuosimaoProvider extends AbstractProvider
{
    protected $url = 'http://sms-api.luosimao.com/v1/send.json';

    public function send($to, $message)
    {
        $response = $this->getHttpClient()->post($this->url, [
            'form_params' => [
                'mobile' => $to,
                'message' => $message
            ],
            'auth' => ['api', 'key-'.$this->config['apikey']]
        ]);

        return json_decode($response->getBody(), TRUE);
    }
}
