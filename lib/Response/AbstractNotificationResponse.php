<?php

namespace Mbilling\Response;

use Mbilling\Model\Notification;
use Mbilling\Model\NotificationInterface;


abstract class AbstractNotificationResponse extends Notification implements NotificationInterface
{
    public function __construct(array $response)
    {
        $this->setId($response['id']);
        $this->setType($response['type']);
        $this->setEvent($response['event']);

        if (strpos('payment.', $response['event']) !== false) {
            $this->setObject(new PaymentResponse($response['event']));
        }

        if (strpos('subscription.', $response['event']) !== false) {
            $this->setObject(new PaymentResponse($response['event']));
        }
    }
}