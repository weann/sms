```php
<?php

use Sms\Sms;

$sms = new Sms([
    'luosimao' => [
        'apikey' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'
    ],
    'guzzle' => [
        'timeout' => 10
    ]
]);

$ret = $sms->driver('luosimao')->send('13000000000', 'message');

var_dump($ret);
```