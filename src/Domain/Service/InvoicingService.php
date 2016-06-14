<?php

namespace CleanPhp\Invoicer\Domain\Service;

use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;

class InvoicingService
{
	public function __constrcut(OrderRepositoryInterface $orderRepository)
	{
		$this->orderRepository = $orderRepository;
	}

	public function generateInvoices()
	{
		$orders = $this->orderRepository->getUninvoicedOrders();
	}
}