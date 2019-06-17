<?php

namespace Mbilling\Common\Helper;


class HeadersParser
{
    /**
     * @param $httpHeaders
     * @return array
     */
    public static function parse($httpHeaders)
    {
        $headers = array();
        $key = '';

        foreach (explode("\n", $httpHeaders) as $httpHeader) {
            if (trim($httpHeader) === '') {
                break;
            }
            $header = explode(':', $httpHeader, 2);
            if (isset($header[1])) {
                if (!isset($headers[$header[0]])) {
                    $headers[trim($header[0])] = trim($header[1]);
                } elseif (is_array($headers[$header[0]])) {
                    $headers[trim($header[0])] = array_merge($headers[trim($header[0])], array(trim($header[1])));
                } else {
                    $headers[trim($header[0])] = array_merge(array($headers[trim($header[0])]), array(trim($header[1])));
                }
                $key = $header[0];
            } else {
                if (substr($header[0], 0, 1) === "\t") {
                    $headers[$key] .= "\r\n\t" . trim($header[0]);
                } elseif (!$key) {
                    $headers[0] = trim($header[0]);
                }
            }
        }

        return $headers;
    }
}