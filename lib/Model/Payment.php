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
    private $createAt;
    /** @var string */
    private $status;
    /** @var PaymentErrorInterface|null */
    private $error;
    /** @var string */
    private $paymentMethod;
    /** @var string|null */
    private $confirmationUrl;
    /** @var PaymentPayer */
    private $payer;
    /** @var MoneyTypeInterface */
    private $amount;
    /** @var MoneyTypeInterface */
    private $profit;
    /** @var string */
    private $account;
    /** @var string */
    private $description;
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
     * @param \DateTime $createAt
     */
    protected function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
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
     * @param MoneyTypeInterface $profit
     */
    protected function setProfit($profit)
    {
        $this->profit = $profit;
    }

    /**
     * @return MoneyTypeInterface
     */
    public function getProfit()
    {
        return $this->profit;
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