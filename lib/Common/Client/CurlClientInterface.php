<?php

namespace Mbilling\Common\Client;


interface CurlClientInterface
{
    public function execute($path, $method, $queryParams = array(), $body = null, $headers = array());
    public function setUrl($url);
    public function setSecretKey($secretKey);
    public function setTimeout($timeout);
    public function setAttempts($attempts);
}

