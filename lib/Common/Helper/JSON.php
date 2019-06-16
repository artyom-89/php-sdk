<?php

namespace Mbilling\Common\Helper;

use Mbilling\Common\Exception\JsonException;
use Mbilling\Common\Response;


class JSON
{
    /**
     * @param array $serializedData
     * @return false|string
     */
    public static function encode(array $serializedData)
    {
        $result = json_encode($serializedData);

        if ($result === false) {
            throw new JsonException("Failed serialize json.", json_last_error());
        }

        return $result;
    }

    /**
     * @param Response $response
     * @return array
     */
    public static function decode(Response $response)
    {
        $resultArray = json_decode($response->getBody(), true);

        if ($resultArray === null) {
            throw new JsonException('Failed to decode response', json_last_error());
        }

        return $resultArray;
    }
}