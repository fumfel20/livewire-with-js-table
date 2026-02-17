<div x-init="window.addEventListener('popstate', () => { Livewire.first().$refresh() })" wire:loading.class="opacity-50 pointer-events-none">
    <div class="container-md">
        <h1 class="display-3">Inactive Orders</h1>
    </div>

    <div style="display: none" id="delivery_date_for_calendar" value="{{ $this->delivery_date }}"></div>
    <div id="extGrid" class="container-md">
        <div class="row justify-content-center">
            <blockquote style="border-color: #39b451; background-color: #EBECEE; height: 170px;">
                <div  id="externalGrids" class="jakisSelect">
                    <label for="intOrderId">Order No:</label><br>
                    <span wire:loading.remove id="intOrderId"></span>
                    <input id="flt1_table300" wire:loading>
                </div>
                <div  id="externalGrids" class="jakisSelect2">
                    <label for="strVehicleLoad">Load Id:</label><br>
                    <span wire:loading.remove id="strVehicleLoad"></span>
                    <input id="flt2_table300" value="< Show all >" wire:loading>
                </div>
                <div  id="externalGrids" class="">
                    <label for="strRunNumber">Run No:</label><br>
                    <span wire:loading.remove id="strRunNumber"></span>
                    <input id="flt3_table300" value="< Show all >" wire:loading>
                </div>
                <div  id="externalGrids" class="">
                    <label for="strDeliveryMethod">Delivery Method:</label><br>
                    <span wire:loading.remove id="strDeliveryMethod"></span>
                    <input value="< Show all >" wire:loading>
                </div>
                <input type="hidden" name="Current Count" id="q9" value="{{ $orders->sum('intQuantity') - $orders->sum('intSumTrolleyPizzaBoxOutstanding') }}">
                <input type="hidden" name="Total" id="q10" value="{{ $orders->sum('intQuantity') }}">
                <div id="externalGrids" style="width: 250px;">
                    <label for="">Progress</label><br>
                    <div wire:loading.remove id="myProgress">
                        <div id="myBar">
                            <div id="label"></div>
                        </div>
                    </div>
                </div>
                <x-calendar-single-date label="Delivery Date" name="delivery_date" value="{{ $delivery_date }}"></x-calendar-single-date>
            </blockquote>
        </div>
    </div>

    <div class="container-md">
        <table id="table" class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order Id</th>
                <th scope="col">Order Status</th>
                <th scope="col">Delivery Date</th>
                <th scope="col">Product Code</th>
                <th scope="col">Description</th>
                <th scope="col">length</th>
                <th scope="col">width</th>
                <th scope="col">height</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->order_status->status_name }}</td>
                    <td>{{ $order->orders->delivery_date }}</td>
                    <td>{{ $order->products->product_code }}</td>
                    <td>{{ $order->products->product_description }}</td>
                    <td>{{ $order->products->length }}</td>
                    <td>{{ $order->products->width }}</td>
                    <td>{{ $order->products->height }}</td>
                    <td>{{ $order->products->price }}</td>
                </tr>
            @endforeach


            </tbody>
        </table>

    </div>

    <div wire:key="{{ \Illuminate\Support\Str::random(10) }}" x-data="initJsInactiveOrders()"></div>
    @script
    <script>


        Alpine.data('initJsInactiveOrders',() => ({
            init() {
                setTimeout(() => {
                    let tfConfig = {
                        base_path: '/assets-bs5/TableFilter7.3/dist/tablefilter/',
                        col_0: 'input',
                        col_1: 'input',
                        col_2: 'select',
                        col_3: 'select',
                        col_4: 'select',
                        col_8: 'select',
                        mark_active_columns: true,
                        col_types: [
                            'string', 'string', 'number',
                            'number', 'number', 'number',
                            'number', 'number', 'number'
                        ],
                        /* external filters */
                        external_flt_ids: [
                            null,
                            'intOrderId',
                            'strVehicleLoad',
                            'strRunNumber',
                            'strDeliveryMethod'
                        ],
                        alternate_rows: true,
                        state: {
                            types: ['local_storage'],
                            filters: true,
                        },
                        // clear_filter_text: [
                        //     '< Show all >',
                        //     '< Show all >',
                        //     '< Show all >',
                        //     '< Show all >',
                        //     '< Show all >',
                        // ],
                        // extensions: [
                        //     {
                        //         name: 'sort' },
                        //     {
                        //         // minimal configuration for column operation extension
                        //         name: 'colOps',
                        //         col: [5,6,7],
                        //         id: ['quantity_sum','picking_outstanding_sum','trolley_outstanding_sum'],
                        //         operation: ['sum','sum','sum'],
                        //         decimal_precision: [0,0,0]
                        //     }
                        // ],

                    };
                    const tf = new TableFilter('table',tfConfig);
                    tf.extension('sort');
                    tf.extension('colOps');
                    tf.init();


                    const element = document.getElementById('dtmDispatchDateForCalendar');
                    const dateValue = element.getAttribute('value');
                    flatpickr("#selector", {
                        dateFormat: "Y-m-d",
                        defaultDate: (dateValue ? dateValue : "today"),
                        "locale": {
                            "firstDayOfWeek": 1 // start week on Monday
                        },
                        onClose: function(dtmDispatchDate) {
                            @this.set('dtmDispatchDate',  this.formatDate(dtmDispatchDate[0], "Y-m-d"));
                        },
                    });








                }, 500);

            }}));
    </script>
    @endscript

</div>
