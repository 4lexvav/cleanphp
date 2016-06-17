<?php

namespace CleanPhp\Invoicer\Domain\Service;

use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;

class InvoicingService
{
	/**
	 * @var OrderRepositoryInterface
	 */
	private $orderRepository;

	/**
	 * @var InvoiceFactory
	 */
	private $invoiceFactory;

	public function __construct(OrderRepositoryInterface $orderRepository, InvoiceFactory $invoiceFactory)
	{
		$this->orderRepository = $orderRepository;
		$this->invoiceFactory = $invoiceFactory;
	}

	public function generateInvoices()
	{
		$invoices = [];
		$orders = $this->orderRepository->getUninvoicedOrders();

		foreach ($orders as $order) {
			$invoices[] = $this->invoiceFactory->createFromOrder($order);
		}

		return $invoices;
	}
}