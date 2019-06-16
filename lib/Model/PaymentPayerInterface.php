<?php

namespace Mbilling\Model;


interface PaymentPayerInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @return boolean
     */
    public function isSaved();
}