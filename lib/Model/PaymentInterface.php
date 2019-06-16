<?php

namespace Mbilling\Model;

use Mbilling\Model\Type\MoneyTypeInterface;


interface PaymentInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getProjectId();

    /**
     * @return \DateTime
     */
    public function getCreateAt();

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @return PaymentErrorInterface
     */
    public function getError();

    /**
     * @return string
     */
    public function getPaymentMethod();

    /**
     * @return string|null
     */
    public function getConfirmationUrl();

    /**
     * @return PaymentPayerInterface
     */
    public function getPayer();

    /**
     * @return string
     */
    public function getAccount();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return MoneyTypeInterface
     */
    public function getAmount();

    /**
     * @return MoneyTypeInterface
     */
    public function getProfit();

    /**
     * @return boolean
     */
    public function isTest();
}