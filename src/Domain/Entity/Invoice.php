<?php

namespace CleanPhp\Invoicer\Domain\Entity;

class Invoice extends AbstractEntity
{
	protected $order;
	protected $invoiceDate;
	protected $total;

    /**
     * Gets the value of order.
     *
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets the value of order.
     *
     * @param Order $order the order
     *
     * @return self
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Gets the value of invoiceDate.
     *
     * @return mixed
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * Sets the value of invoiceDate.
     *
     * @param \DateTime $invoiceDate the invoice date
     *
     * @return self
     */
    public function setInvoiceDate(\DateTime $invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;

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
     * @param mixed $total the total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}