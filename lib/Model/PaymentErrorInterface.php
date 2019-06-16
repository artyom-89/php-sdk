<?php

namespace Mbilling\Model;


interface PaymentErrorInterface
{
    /**
     * @return string
     */
    public function getCode();

    /**
     * @return string
     */
    public function getDescription();
}