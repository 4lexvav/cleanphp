<?php

use CleanPhp\Invoicer\Domain\Entity\Customer;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Persistence\Hydrator\OrderHydrator;
use Zend\Stdlib\Hydrator\ClassMethods;

describe('Persistence\Hydrator\OrderHydrator', function() {
    beforeEach(function() {
        $this->repository = $this->getProphet()
            ->prophesize('CleanPhp\Invoicer\Domain\Repository\CustomerRepository');
        $this->hydrator = new OrderHydrator(new ClassMethods(), $this->repository->reveal());
    });

    describe('->hydrate', function() {
        it('should perform basic hydration of attributes', function() {
            $data = [
                'id' => 100,
                'order_number' => '20150101-019',
                'description' => 'simple order',
                'total' => 5000
            ];

            $order = new Order();
            $this->hydrator->hydrate($data, $order);

            expect($order->getId())->to->equal($data['id']);
            expect($order->getOrderNumber())->to->equal($data['order_number']);
            expect($order->getDescription())->to->equal($data['description']);
            expect($order->getTotal())->to->equal($data['total']);
        });

        it('should hydrate a Customer entity on the Order', function () {
            $data = ['customer_id' => 500];

            $customer = (new Customer())->setId(500);
            $order = new Order();

            $this->repository->getById(500)
                ->shouldBeCalled()
                ->willReturn($customer);

            $this->hydrator->hydrate($data, $order);

            expect($order->getCustomer())->to->equal($customer);

            $this->getProphet()->checkPredictions();
        });
    });
});