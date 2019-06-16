<?php

namespace Mbilling\Model\Type;


interface MoneyTypeInterface
{
    /**
     * @return string
     */
    public function getValue();

    /**
     * @return string
     */
    public function getCurrency();
}