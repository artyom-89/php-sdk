<?php

namespace Mbilling\Model;

use Mbilling\Model\Type\MoneyTypeInterface;


class Payment implements PaymentInterface
{
    /** @var string */
    private $id;
    /** @var string */
    private $projectId;
    /** @var \DateTime */
    private $createdAt;
    /** @var \DateTime */
    private $canceledAt;
    /** @var string */
    private $status;
    /** @var PaymentErrorInterface|null */
    private $error;
    /** @var string|null */
    private $confirmationUrl;
    /** @var string */
    private $paymentMethod;
    /** @var PaymentPayer */
    private $payer;
    /** @var string */
    private $account;
    /** @var string */
    private $description;
    /** @var MoneyTypeInterface */
    private $amount;
    /** @var MoneyTypeInterface */
    private $refundedAmount;
    /** @var boolean */
    private $test;


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
     * @param string $projectId
     */
    protected function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return string
     */
    public function getProjectId()
    {
        return $this->projectId;
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
     * @param PaymentErrorInterface $error
     */
    protected function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return PaymentErrorInterface|null
     */
    public function getError()
    {
        return $this->error;
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
     * @param string $confirmationUrl
     */
    protected function setConfirmationUrl($confirmationUrl)
    {
        $this->confirmationUrl = $confirmationUrl;
    }

    /**
     * @return string|null
     */
    public function getConfirmationUrl()
    {
        return $this->confirmationUrl;
    }

    /**
     * @param PaymentPayer $payer
     */
    protected function setPayer($payer)
    {
        $this->payer = $payer;
    }

    /**
     * @return PaymentPayer
     */
    public function getPayer()
    {
        return $this->payer;
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
     * @param MoneyTypeInterface $refundedAmount
     */
    public function setRefundedAmount($refundedAmount)
    {
        $this->refundedAmount = $refundedAmount;
    }

    /**
     * @return MoneyTypeInterface
     */
    public function getRefundedAmount()
    {
        return $this->refundedAmount;
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
     * @param string $description
     */
    protected function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param bool $test
     */
    protected function setTest($test)
    {
        $this->test = $test;
    }

    /**
     * @return bool
     */
    public function isTest()
    {
        return $this->test;
    }
}