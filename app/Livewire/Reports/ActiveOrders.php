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
#[Title('Active Orders')]
class ActiveOrders extends Component
{
    #[Url]
    public string $delivery_date = '';

    public const ACTIVE = 'Active';

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
                $query->where('status_name', self::ACTIVE);
            })
//            ->where('')
            ->get();
        return view('livewire.reports.active-orders', compact('orders','delivery_date'));
    }
}
