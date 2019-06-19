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
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @return \DateTime|null
     */
    public function getCanceledAt();

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @return PaymentErrorInterface|null
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
     * @return MoneyTypeInterface|null
     */
    public function getRefundedAmount();

    /**
     * @return boolean
     */
    public function isTest();
}