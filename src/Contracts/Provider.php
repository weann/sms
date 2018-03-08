<?php

namespace Sms\Contracts;

interface Provider
{
    public function send($to, $message);
}
