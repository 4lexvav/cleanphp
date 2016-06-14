<?php

namespace CleanPhp\Invoicer\Domain\Entity;

class Order extends AbstractEntity
{
	protected $customer;
	protected $orderNumber;
	protected $description;
	protected $total;

    /**
     * Gets the value of customer.
     *
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Sets the value of customer.
     *
     * @param mixed $customer the customer
     *
     * @return self
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Gets the value of orderNumber.
     *
     * @return mixed
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Sets the value of orderNumber.
     *
     * @param mixed $orderNumber the order number
     *
     * @return self
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param mixed $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of total.
     *
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Sets the value of total.
     *
     * @param mixed $total the order
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}