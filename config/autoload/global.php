<?php

use CleanPhp\Invoicer\Domain\Entity\Customer;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Domain\Entity\Invoice;
use CleanPhp\Invoicer\Persistence\Zend\DataTable\CustomerTable;
use CleanPhp\Invoicer\Persistence\Zend\DataTable\OrderTable;
use CleanPhp\Invoicer\Persistence\Zend\DataTable\InvoiceTable;
use CleanPhp\Invoicer\Persistence\Zend\TableGateway\TableGatewayFactory;
use Zend\StdLib\Hydrator\ClassMethods;

return [
    'service_manager' => [
        'factories' => [
            'CustomerTable' => function($sm) {
                $factory = new TableGatewayFactyory();
                $hydrator = new ClassMethods();

                return new CustomerTable(
                    $factory->createGateway(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        $hydrator,
                        new Customer(),
                        'customers'
                    ),
                    $hydrator
                );
            },
            'OrderTable' => function($sm) {
                $factory = new TableGatewayFactyory();
                $hydrator = new ClassMethods();

                return new OrderTable(
                    $factory->createGateway(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        $hydrator,
                        new Order(),
                        'orders'
                    ),
                    $hydrator
                );
            },
            'InvoiceTable' => function($sm) {
                $factory = new TableGatewayFactyory();
                $hydrator = new ClassMethods();

                return new InvoiceTable(
                    $factory->createGateway(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        $hydrator,
                        new Invoice(),
                        'invoices'
                    ),
                    $hydrator
                );
            },
            'Zebd\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ],
    ],
];
