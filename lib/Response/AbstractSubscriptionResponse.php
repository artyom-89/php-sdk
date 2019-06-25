<?php

namespace Mbilling\Response;

use Mbilling\Model\Subscription;
use Mbilling\Model\SubscriptionInterface;
use Mbilling\Model\Type\MoneyType;

abstract class AbstractSubscriptionResponse extends Subscription implements SubscriptionInterface
{
    public function __construct(array $response)
    {
        $this->setId($response['id']);
        $this->setCreatedAt(new \DateTime($response['created_at']));

        if (isset($response['started_at'])) {
            $this->setStartedAt(new \DateTime($response['started_at']));
        }
        if (isset($response['canceled_at'])) {
            $this->setCanceledAt(new \DateTime($response['canceled_at']));
        }
        if (isset($response['debited_at'])) {
            $this->setDebitedAt(new \DateTime($response['debited_at']));
        }

        $this->setStatus($response['status']);
        $this->setConfirmed((boolean) $response['confirmed']);

        $amount = new MoneyType();
        $amount->setValue((float) $response['amount']);
        $amount->setCurrency('RUB');
        $this->setAmount($amount);

        $this->setPhone($response['phone']);
        $this->setAccount($response['account']);
        $this->setPaymentMethod($response['payment_method']);
        $this->setPeriod((int) $response['period']);
        $this->setTrialPeriod((int) $response['trial_period']);
    }
}