<?php

namespace CleanPhp\Invoicer\Domain\Repository;

interface OrderRepositoryInterface extends RepositoryInterface
{
	/**
	 * Retrieve all orders without invoices
	 *
	 * @return array
	 */
	public function getUninvoicedOrders();
}