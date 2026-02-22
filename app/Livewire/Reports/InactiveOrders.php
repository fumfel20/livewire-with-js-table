<?php

namespace App\Livewire\Reports;

use App\DeliveryDateTrait;
use App\Repositories\OrdersRepository;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Lazy]
#[Title('Inactive Orders')]
class InactiveOrders extends Component
{
    use DeliveryDateTrait;

    #[Url]
    public string $delivery_date = '';

    public const INACTIVE = 'Inactive';

    public function render(OrdersRepository $ordersRepository)
    {
        $delivery_date = $this->fetchDispatchDate($this->delivery_date);
        $orders = $ordersRepository->orders($delivery_date,self::INACTIVE);

        return view('livewire.reports.inactive-orders', compact('orders','delivery_date'));
    }
}
