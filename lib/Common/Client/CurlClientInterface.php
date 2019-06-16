<?php

namespace Mbilling\Common\Client;


interface CurlClientInterface
{
    public function execute($path, $method, $queryParams = [], $body = null, $headers = []);
    public function setUrl($url);
    public function setSecretKey($secretKey);
    public function setTimeout($timeout);
    public function setAttempts($attempts);
}

