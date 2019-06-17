<?php

namespace Mbilling\Common\Client;

use Mbilling\Common\Exception\ApiException;
use Mbilling\Common\Exception\AuthorizeException;
use Mbilling\Common\Exception\ClientConnectionException;
use Mbilling\Common\Exception\ClientException;
use Mbilling\Common\Exception\ForbiddenException;
use Mbilling\Common\Exception\InternalServerErrorException;
use Mbilling\Common\Exception\NotFoundException;
use Mbilling\Common\Exception\UnauthorizedException;
use Mbilling\Common\Helper\HeadersParser;
use Mbilling\Common\HttpMethod;
use Mbilling\Common\Response;


class CurlClient implements CurlClientInterface
{
    /** @var string */
    private $url;

    /** @var string */
    private $secretKey;

    /** @var bool */
    private $keepAlive = true;

    /** @var int */
    private $timeout = 180;

    /** @var int */
    private $attempts = 1;

    /** @var int */
    private $connectionTimeout = 30;

    /** @var resource */
    private $curl;

    /** @var string */
    private $proxy;

    /** @var array */
    private $defaultHeaders = array();

    /**
     * @param $path
     * @param $method
     * @param array $queryParams
     * @param null $body
     * @param array $headers
     * @return Response
     * @throws ApiException
     * @throws ClientConnectionException
     * @throws ClientException
     * @throws ForbiddenException
     * @throws InternalServerErrorException
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function execute($path, $method, $queryParams = array(), $body = null, $headers = array())
    {
        $attempts = $this->attempts;
        $response = $this->call($path, $method, $queryParams, $body, $headers);

        while ($response->getCode() == 202 && $attempts > 0) {
            $this->delay();
            $attempts--;
            $response = $this->call($path, $method, $queryParams, $body, $headers);
        }

        if ($response->getCode() != 200) {
            $this->handleError($response);
        }

        return $response;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @param $keepAlive
     */
    public function setKeepAlive($keepAlive)
    {
        $this->keepAlive = $keepAlive;
    }

    /**
     * @param int $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * @param int $attempts
     */
    public function setAttempts($attempts)
    {
        $this->attempts = $attempts;
    }

    /**
     * @param $connectionTimeout
     */
    public function setConnectionTimeout($connectionTimeout)
    {
        $this->connectionTimeout = $connectionTimeout;
    }

    /**
     * @param $path
     * @param $method
     * @param array $queryParams
     * @param null $body
     * @param array $headers
     * @return Response
     * @throws AuthorizeException
     * @throws ClientConnectionException
     * @throws ClientException
     */
    private function call($path, $method, array $queryParams = array(), $body = null, array $headers = array())
    {
        $url = $this->url . $path;

        if (empty($this->secretKey)) {
            throw new AuthorizeException('SecretKey not set');
        }

        $queryParams['secretKey'] = $this->secretKey;
        $url = $url . '?' . http_build_query($queryParams);

        $this->initCurl();
        $this->setCurlOption(CURLOPT_URL, $url);
        $this->setCurlOption(CURLOPT_RETURNTRANSFER, true);
        $this->setCurlOption(CURLOPT_HEADER, true);
        $this->setCurlOption(CURLOPT_BINARYTRANSFER, true);

        if ($this->proxy) {
            $this->setCurlOption(CURLOPT_PROXY, $this->proxy);
            $this->setCurlOption(CURLOPT_HTTPPROXYTUNNEL, true);
        }

        $headers = $this->prepareHeaders($headers);
        $this->setCurlOption(CURLOPT_HTTPHEADER, $headers);

        $this->setBody($method, $body);
        $this->setCurlOption(CURLOPT_CONNECTTIMEOUT, $this->connectionTimeout);
        $this->setCurlOption(CURLOPT_TIMEOUT, $this->timeout);

        list($responseHeaders, $responseBody, $responseInfo) = $this->sendRequest();

        if (!$this->keepAlive) {
            $this->closeCurlConnection();
        }

        return new Response($responseInfo['http_code'], $responseHeaders, $responseBody);
    }

    /**
     * @return resource
     */
    private function initCurl()
    {
        if (!$this->curl || !$this->keepAlive) {
            $this->curl = curl_init();
        }
        return $this->curl;
    }

    /**
     *
     */
    public function closeCurlConnection()
    {
        if ($this->curl !== null) {
            curl_close($this->curl);
        }
    }

    /**
     * @param $option
     * @param $value
     * @return bool
     */
    private function setCurlOption($option, $value)
    {
        return curl_setopt($this->curl, $option, $value);
    }

    /**
     * @param $method
     * @param $body
     * @throws ClientException
     */
    public function setBody($method, $body)
    {
        switch ($method) {
            case HttpMethod::POST:
                $this->setCurlOption(CURLOPT_POST, true);
                $this->setCurlOption(CURLOPT_POSTFIELDS, $body);
                break;
            case HttpMethod::PUT:
                $this->setCurlOption(CURLOPT_CUSTOMREQUEST, HttpMethod::PUT);
                $this->setCurlOption(CURLOPT_POSTFIELDS, $body);
                break;
            case HttpMethod::DELETE:
                $this->setCurlOption(CURLOPT_CUSTOMREQUEST, HttpMethod::DELETE);
                $this->setCurlOption(CURLOPT_POSTFIELDS, $body);
                break;
            case HttpMethod::PATCH:
                $this->setCurlOption(CURLOPT_CUSTOMREQUEST, HttpMethod::PATCH);
                $this->setCurlOption(CURLOPT_POSTFIELDS, $body);
                break;
            case HttpMethod::OPTIONS:
                $this->setCurlOption(CURLOPT_CUSTOMREQUEST, HttpMethod::OPTIONS);
                $this->setCurlOption(CURLOPT_POSTFIELDS, $body);
                break;
            case HttpMethod::HEAD:
                $this->setCurlOption(CURLOPT_NOBODY, true);
                break;
            case HttpMethod::GET:
                $this->setCurlOption(CURLOPT_HTTPGET, true);
                break;
            default:
                throw new ClientException('Invalid method verb: ' . $method);
        }
    }

    /**
     * @return array
     * @throws ClientConnectionException
     */
    public function sendRequest()
    {
        $response = curl_exec($this->curl);
        $headerSize = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);
        $headers = HeadersParser::parse(substr($response, 0, $headerSize));
        $body = substr($response, $headerSize);
        $responseInfo = curl_getinfo($this->curl);
        $curlError = curl_error($this->curl);
        $curlErrno = curl_errno($this->curl);

        if ($response === false) {
            $this->handleCurlError($curlError, $curlErrno);
        }

        return array($headers, $body, $responseInfo);
    }

    /**
     * @param $error
     * @param $errno
     * @throws ClientConnectionException
     */
    private function handleCurlError($error, $errno)
    {
        switch ($errno) {
            case CURLE_COULDNT_CONNECT:
            case CURLE_COULDNT_RESOLVE_HOST:
            case CURLE_OPERATION_TIMEOUTED:
                $msg = "No connection.";
                break;
            case CURLE_SSL_CACERT:
            case CURLE_SSL_PEER_CERTIFICATE:
                $msg = "Could not verify SSL certificate.";
                break;
            default:
                $msg = "Unexpected error communicating.";
        }
        $msg .= "\n\n(Network error [errno $errno]: $error)";
        throw new ClientConnectionException($msg);
    }

    /**
     * @param Response $response
     * @throws ForbiddenException
     * @throws InternalServerErrorException
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    private function handleError(Response $response)
    {
        switch ($response->getCode()) {
            case InternalServerErrorException::HTTP_CODE:
                throw new InternalServerErrorException($response);
                break;
            case NotFoundException::HTTP_CODE:
                throw new NotFoundException($response);
                break;
            case ForbiddenException::HTTP_CODE:
                throw new ForbiddenException($response);
                break;
            case UnauthorizedException::HTTP_CODE:
                throw new UnauthorizedException($response);
                break;
        }
    }

    /**
     *
     */
    private function delay()
    {
        usleep($this->timeout * 10000);
    }

    /**
     * @param $headers
     * @return array
     */
    private function prepareHeaders($headers)
    {
        $headers = array_merge($this->defaultHeaders, $headers);
        $headers = array_map(function ($key, $value) {
            return $key . ":" . $value;
        }, array_keys($headers), $headers);
        return $headers;
    }
}

