<?php

namespace Mbilling\Common;


class Response
{
    private $code;
    private $headers;
    private $body;


    public function __construct($code, $headers, $body)
    {
        $this->code = $code;
        $this->headers = $headers;
        $this->body = $body;
    }


    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }
}