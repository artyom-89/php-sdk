<?php

namespace Mbilling\Common\Exception;


use Mbilling\Common\Response;

class ApiResponseException extends ApiException
{
    /** @var string */
    public $type;
    /** @var string */
    public $code;


    public function __construct(Response $response)
    {
        $errorData = json_decode($response->getBody(), true);
        $message   = '';
        if (isset($errorData['description'])) {
            $message .= $errorData['description'].'.';
        }
        if (isset($errorData['code'])) {
            $this->code = $errorData['code'];
            $message .= sprintf('Error code: %s.', $errorData['code']);
        }
        if (isset($errorData['parameter'])) {
            $message .= sprintf('Parameter name: %s.', $errorData['parameter']);
        }
        if (isset($errorData['type'])) {
            $this->type = $errorData['type'];
        }

        parent::__construct($message, $response->getCode(), $response->getHeaders(), $response->getBody());
    }
}