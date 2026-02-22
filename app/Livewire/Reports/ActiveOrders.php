<?php

namespace App\Livewire\Reports;

use App\DeliveryDateTrait;
use App\Repositories\OrdersRepository;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Lazy]
#[Title('Active Orders')]
class ActiveOrders extends Component
{
    use DeliveryDateTrait;

    #[Url]
    public string $delivery_date = '';

    public const ACTIVE = 'Active';

    public function render(OrdersRepository $ordersRepository)
    {
        $delivery_date = $this->fetchDispatchDate($this->delivery_date);
        $orders = $ordersRepository->orders($delivery_date,self::ACTIVE);

        return view('livewire.reports.active-orders', compact('orders','delivery_date'));
    }
}
