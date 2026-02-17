<?php

namespace App\Livewire\Reports;

use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Lazy]
#[Title('Inactive Orders')]
class InactiveOrders extends Component
{
    #[Url]
    public string $delivery_date = '';

    public const INACTIVE = 'Inactive';

    public function render()
    {
        $delivery_date = $this->delivery_date ?: Carbon::now()->format('Y-m-d');

        $orders = OrderProduct::query()
            ->with('products')
            ->with('orders')
            ->with('order_status')
            ->whereHas('orders', function ($query) use ($delivery_date) {
                $query->where('delivery_date', $delivery_date);
            })
            ->whereHas('order_status', function ($query) {
                $query->where('status_name', self::INACTIVE);
            })
//            ->where('')
            ->get();
//        dd($orders);
        return view('livewire.reports.inactive-orders', compact('orders','delivery_date'));
    }
}
