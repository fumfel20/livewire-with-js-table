<?php

namespace App;

use Carbon\Carbon;

trait DeliveryDateTrait
{
    /**
     * @param $dispatch_date
     * @return mixed|string
     */
    public function fetchDispatchDate($dispatch_date): mixed
    {
        return $dispatch_date ?: Carbon::now()->format('Y-m-d');
    }
}
