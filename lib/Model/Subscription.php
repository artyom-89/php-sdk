<?php

namespace Mbilling\Model;


use Mbilling\Model\Type\MoneyTypeInterface;


class Subscription implements SubscriptionInterface
{
    /** @var string */
    private $id;
    /** @var \DateTime */
    private $createdAt;
    /** @var \DateTime */
    private $startedAt;
    /** @var \DateTime */
    private $stoppedAt;
    /** @var \DateTime */
    private $canceledAt;
    /** @var string */
    private $status;
    /** @var boolean */
    private $confirmed;
    /** @var MoneyTypeInterface */
    private $amount;
    /** @var string */
    private $phone;
    /** @var string */
    private $account;
    /** @var string */
    private $paymentMethod;
    /** @var int */
    private $period;
    /** @var int */
    private $trialPeriod;


    /**
     * @param string $id
     */
    protected function setId($id)
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
     * @param \DateTime $createdAt
     */
    protected function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $startedAt
     */
    protected function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;
    }

    /**
     * @return \DateTime
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * @param \DateTime $stoppedAt
     */
    protected function setStoppedAt($stoppedAt)
    {
        $this->stoppedAt = $stoppedAt;
    }

    /**
     * @return \DateTime
     */
    public function getStoppedAt()
    {
        return $this->stoppedAt;
    }

    /**
     * @param \DateTime $canceledAt
     */
    protected function setCanceledAt($canceledAt)
    {
        $this->canceledAt = $canceledAt;
    }

    /**
     * @return \DateTime
     */
    public function getCanceledAt()
    {
        return $this->canceledAt;
    }

    /**
     * @param string $status
     */
    protected function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $confirmed
     */
    protected function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @param MoneyTypeInterface $amount
     */
    protected function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return MoneyTypeInterface
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $phone
     */
    protected function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $account
     */
    protected function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param string $paymentMethod
     */
    protected function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param int $period
     */
    protected function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @return int
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param int $trialPeriod
     */
    protected function setTrialPeriod($trialPeriod)
    {
        $this->trialPeriod = $trialPeriod;
    }

    /**
     * @return int
     */
    public function getTrialPeriod()
    {
        return $this->trialPeriod;
    }
}