<?php

namespace Mbilling\Model;


interface NotificationInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getEvent();

    /**
     * @return PaymentInterface|SubscriptionInterface
     */
    public function getObject();
}