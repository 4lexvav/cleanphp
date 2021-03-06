<?php

namespace CleanPhp\Invoicer\Persistence\Hydrator;

use CleanPhp\Invoicer\Domain\Entity\Customer;
use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

class OrderHydrator implements HydratorInterface
{
    protected $wrappedHydrator;

    protected $customerRepository;

    /**
     * OrderHydrator constructor.
     * @param $wrappedHydrator
     * @param $customerRepository
     */
    public function __construct(HydratorInterface $wrappedHydrator, CustomerRepositoryInterface $customerRepository)
    {
        $this->wrappedHydrator = $wrappedHydrator;
        $this->customerRepository = $customerRepository;
    }

    public function hydrate(array $data, $order)
    {
        $this->wrappedHydrator->hydrate($data, $order);

        if (isset($data['customer_id'])) {
            $order->setCustomer($this->customerRepository->getById($data['customer_id']));
        }

        return $order;
    }

    public function extract($object)
    {
        $this->wrappedHydrator->extract($object);
    }
}