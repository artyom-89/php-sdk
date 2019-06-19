<?php

namespace Mbilling\Model;


class Notification implements NotificationInterface
{
    const EVENT_PAYMENT_SUCCEEDED = 'payment.succeeded';
    const EVENT_PAYMENT_CANCELED = 'payment.canceled';

    const EVENT_SUBSCRIPTION_STARTED = 'subscription.started';
    const EVENT_SUBSCRIPTION_STOPPED = 'subscription.stopped';
    const EVENT_SUBSCRIPTION_CANCELED = 'subscription.canceled';

    /** @var string */
    private $id;
    /** @var string */
    private $type;
    /** @var string */
    private $event;
    /** @var PaymentInterface|SubscriptionInterface */
    private $object;

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $type
     */
    protected function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $event
     */
    protected function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param PaymentInterface|SubscriptionInterface $object
     */
    protected function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @return PaymentInterface|SubscriptionInterface
     */
    public function getObject()
    {
        return $this->object;
    }
}