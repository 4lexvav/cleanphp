<?php

namespace CleanPhp\Invoicer\Domain\Factory;

use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Domain\Entity\Invoice;

class InvoiceFactory
{
	/**
	 * Create invoice from order
	 *
	 * @param Order $order
	 *
	 * @return Invoice
	 */
	public function createFromOrder(Order $order)
	{
		$invoice = new Invoice();
		$invoice->setOrder($order);
		$invoice->setTotal($order->getTotal());
		$invoice->setInvoiceDate(new \DateTime());

		return $invoice;
	}
}