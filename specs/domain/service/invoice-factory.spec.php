<?php

use CleanPhp\Invoicer\Domain\Entity\Invoice;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;
use CleanPhp\Invoicer\Domain\Service\InvoicingService;

describe('InvoiceFactory', function() {
	describe('->createFromOrder()', function() {
		it('Should return an Invoice object', function() {
			$order = new Order();
			$factory = new InvoiceFactory();
			$invoice = $factory->createFromOrder($order);

			expect($invoice)->to->be->instanceof('CleanPhp\Invoicer\Domain\Entity\Invoice');
		});

		it('Should set the total of the Order', function() {
			$order = new Order();
			$order->setTotal(500);

			$factory = new InvoiceFactory();
			$invoice = $factory->createFromOrder($order);

			expect($invoice->getTotal())->to->equal($order->getTotal());
		});

		it('Should associate the Order to the Invoice', function() {
			$order = new Order();

			$factory = new InvoiceFactory();
			$invoice = $factory->createFromOrder($order);

			expect($invoice->getOrder())->to->equal($order);
		});

		it('Should set the date of the Invoice', function() {
			$order = new Order();

			$factory = new InvoiceFactory();
			$invoice = $factory->createFromOrder($order);

			expect($invoice->getInvoiceDate())->to->loosely->equal(new \DateTime());
		});
	});
});

describe('InvoicingService', function() {
	describe('->generateInvoices', function() {
		beforeEach(function() {
			$this->repository = $this->getProphet()->prophesize(
				'CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface'
			);
			$this->factory = $this->getProphet()->prophesize(
				'CleanPhp\Invoicer\Domain\Factory\InvoiceFactory'
			);
		});

		it('Should query the repository for uninvoiced Orders', function() {
			$this->repository->getUninvoicedOrders()->willReturn([]);
			$this->factory->createFromOrder([])->willReturn([]);

			$this->repository->getUninvoicedOrders()->shouldBeCalled();
			$service = new InvoicingService($this->repository->reveal(), $this->factory->reveal());
			$service->generateInvoices();
		});

		it('Should return an Invoice for each uninvoiced Order', function() {
			$orders = [(new Order())->setTotal(400)];
			$invoices = [(new Invoice())->setTotal(400)];

			$this->repository->getUninvoicedOrders()->willReturn($orders);
			$this->factory->createFromOrder($orders[0])->willReturn($invoices[0]);

			$service = new InvoicingService($this->repository->reveal(), $this->factory->reveal());
			$results = $service->generateInvoices();

			expect($results)->to->be->a('array');
			expect($results)->to->have->length(count($orders));
		});

		afterEach(function() {
			$this->getProphet()->checkPredictions();
		});
	});
});