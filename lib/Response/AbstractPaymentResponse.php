<?php

namespace Mbilling\Response;

use Mbilling\Model\Payment;
use Mbilling\Model\PaymentError;
use Mbilling\Model\PaymentInterface;
use Mbilling\Model\PaymentPayer;
use Mbilling\Model\Type\MoneyType;


abstract class AbstractPaymentResponse extends Payment implements PaymentInterface
{
    public function __construct(array $response)
    {
        $this->setId($response['id']);
        $this->setProjectId($response['project_id']);
        $this->setCreateAt(new \DateTime($response['created_at']));
        $this->setStatus($response['status']);

        if (isset($response['error'])) {
            $error = new PaymentError();
            $error->setCode($response['error']['code']);
            $error->setCode($response['error']['description']);
            $this->setError($error);
        }

        if (!empty($response['confirmation_url'])) {
            $this->setConfirmationUrl($response['confirmation_url']);
        }

        $payer = new PaymentPayer();
        $payer->setId($response['payer']['id']);
        $payer->setPhone($response['payer']['phone']);
        $payer->setSaved((boolean) $response['payer']['saved']);
        $this->setPayer($payer);

        $this->setPaymentMethod($response['payment_method']);
        $this->setAccount($response['account']);
        $this->setDescription($response['description']);

        $amount = new MoneyType();
        $amount->setValue((float) $response['amount']);
        $amount->setCurrency($response['currency']);
        $this->setAmount($amount);

        $profit = new MoneyType();
        $profit->setValue((float) $response['profit']);
        $profit->setCurrency($response['currency']);
        $this->setProfit($profit);

        $this->setTest((boolean) $response['test']);
    }
}