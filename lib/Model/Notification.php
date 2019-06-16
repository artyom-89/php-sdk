<?php

namespace Mbilling\Model;


class Notification implements NotificationInterface
{
    /** @var string */
    private $id;
    /** @var string */
    private $type;
    /** @var string */
    private $event;
    /** @var PaymentInterface */
    private $object;

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
     * @param string $type
     */
    protected function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $event
     */
    protected function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param PaymentInterface $object
     */
    protected function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @return PaymentInterface
     */
    public function getObject()
    {
        return $this->object;
    }
}