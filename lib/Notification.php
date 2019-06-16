<?php

namespace Mbilling;

use Mbilling\Common\Exception\AuthorizeException;
use Mbilling\Common\Helper\JSON;
use Mbilling\Common\Response;
use Mbilling\Response\NotificationResponse;


class Notification
{
    /** @var string */
    private $secretKey;
    /** @var Client */
    private $client;


    public function __construct()
    {
        $this->client = new Client();
    }


    /**
     * @param $secretKey
     */
    public function setAuth($secretKey)
    {
        $this->client->setAuth($secretKey);
    }

    /**
     * @return Model\NotificationInterface
     * @throws AuthorizeException
     * @throws Common\Exception\ClientException
     */
    public function process()
    {
        $request = $this->getRequest();
        $notification = new NotificationResponse($request);
        $object = $notification->getObject();

        return $this->client->getNotification(['id' => $object->getId()]);
    }

    /**
     * @return array
     * @throws AuthorizeException
     */
    private function getRequest()
    {
        if (empty($this->secretKey)) {
            throw new AuthorizeException('SecretKey not set');
        }

        $requestBody = file_get_contents('php://input');
        $request = new Response(200, [], $requestBody);
        return JSON::decode($request);
    }
}