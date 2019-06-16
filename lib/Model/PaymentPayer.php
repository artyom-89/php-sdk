<?php

namespace Mbilling\Model;


class PaymentPayer implements PaymentPayerInterface
{
    /** @var string */
    private $id;
    /** @var string */
    private $phone;
    /** @var boolean */
    private $saved;

    /**
     * @param string $id
     */
    public function setId($id)
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
     * @param string $phone
     */
    public function setPhone($phone)
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
     * @param bool $saved
     */
    public function setSaved($saved)
    {
        $this->saved = $saved;
    }

    /**
     * @return bool
     */
    public function isSaved()
    {
        return $this->saved;
    }
}