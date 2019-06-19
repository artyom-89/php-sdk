<?php

namespace Mbilling\Model;

use Mbilling\Model\Type\MoneyTypeInterface;


interface SubscriptionInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @return \DateTime|null
     */
    public function getStartedAt();

    /**
     * @return \DateTime|null
     */
    public function getStoppedAt();

    /**
     * @return \DateTime|null
     */
    public function getCanceledAt();

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @return boolean
     */
    public function isConfirmed();

    /**
     * @return MoneyTypeInterface
     */
    public function getAmount();

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @return string
     */
    public function getAccount();

    /**
     * @return string
     */
    public function getPaymentMethod();

    /**
     * @return int
     */
    public function getPeriod();

    /**
     * @return int
     */
    public function getTrialPeriod();
}