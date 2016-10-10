<?php

namespace Application\Controller;

use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

class OrdersController extends AbstractActionController
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orders)
    {
        $this->orderRepository = $orders;
    }

    public function indexAction()
    {
        return [
            'orders' => $this->orderRepository->getAll()
        ];
    }

    public function viewAction()
    {
        $id = $this->params()->fromRoute('id');
        $order = $this->orderRepository->getById($id);

        if(!$order) {
            $this->getResponse()->setStatusCode(404);
            return null;
        }

        return ['order' => $order];
    }
}