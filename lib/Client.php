<?php

namespace Mbilling;

use Mbilling\Common\Client\CurlClient;
use Mbilling\Common\Helper\ConfigurationLoader;
use Mbilling\Common\Helper\JSON;
use Mbilling\Common\HttpMethod;
use Mbilling\Model\NotificationInterface;
use Mbilling\Model\PaymentInterface;
use Mbilling\Response\NotificationResponse;
use Mbilling\Response\PaymentResponse;


class Client
{
    /** @var CurlClient */
    private $curlClient;


    public function __construct()
    {
        $configurationLoader = new ConfigurationLoader();
        $config = $configurationLoader->load()->getConfig();

        $this->curlClient = new CurlClient();
        $this->curlClient->setUrl($config['url']);
    }


    /**
     * @param $secretKey
     */
    public function setAuth($secretKey)
    {
        $this->curlClient->setSecretKey($secretKey);
    }

    /**
     * @param array $request
     * @return PaymentInterface
     * @throws Common\Exception\ApiException
     */
    public function createPayment(array $request)
    {
        $path = "/payments/create";
        $response = $this->curlClient->execute($path, HttpMethod::POST, $request);
        return new PaymentResponse(JSON::decode($response));
    }

    /**
     * @param array $request
     * @return PaymentInterface
     * @throws Common\Exception\ApiException
     */
    public function getPayment(array $request)
    {
        $path = "/payments/find";
        $response = $this->curlClient->execute($path, HttpMethod::POST, $request);
        return new PaymentResponse(JSON::decode($response));
    }

    /**
     * @param array $request
     * @return NotificationInterface
     * @throws Common\Exception\ApiException
     */
    public function getNotification(array $request)
    {
        $path = "/notifications/find";
        $response = $this->curlClient->execute($path, HttpMethod::POST, $request);
        return new NotificationResponse(JSON::decode($response));
    }
}