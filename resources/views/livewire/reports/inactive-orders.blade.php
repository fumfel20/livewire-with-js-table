<div x-init="window.addEventListener('popstate', () => { Livewire.first().$refresh() })" wire:loading.class="opacity-50 pointer-events-none">
    <div class="container-md">
        <h1 class="display-3">Inactive Orders</h1>
    </div>

    <div style="display: none" id="delivery_date_for_calendar" value="{{ $this->delivery_date }}"></div>
    <div id="extGrid" class="container-md">
        <div class="row justify-content-center">
            <blockquote style="border-color: #39b451; background-color: #EBECEE; height: 170px;">
                <div  id="externalGrids" class="">
                    <label for="id">Order No:</label><br>
                    <span wire:loading.remove id="id"></span>
                    <input id="flt1_table300" wire:loading>
                </div>
                <div  id="externalGrids" class="">
                    <label for="status_name">Order Status:</label><br>
                    <span wire:loading.remove id="status_name"></span>
                    <input id="flt2_table300" value="< Show all >" wire:loading>
                </div>
                <div  id="externalGrids" class="">
                    <label for="delivery_date">Run No:</label><br>
                    <span wire:loading.remove id="delivery_date"></span>
                    <input id="flt3_table300" value="< Show all >" wire:loading>
                </div>
                <div  id="externalGrids" class="">
                    <label for="product_code">Product Code:</label><br>
                    <span wire:loading.remove id="product_code"></span>
                    <input value="< Show all >" wire:loading>
                </div>
                <div  id="externalGrids" class="">
                    <label for="description">Description:</label><br>
                    <span wire:loading.remove id="description"></span>
                    <input value="< Show all >" wire:loading>
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
                        col_3: 'input',
                        col_4: 'input',
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
                            'id',
                            'status_name',
                            'delivery_date',
                            'product_code',
                            'description'
                        ],
                        alternate_rows: true,
                        state: {
                            types: ['local_storage'],
                            filters: true,
                        },
                        clear_filter_text: [
                            '< Show all >',
                            '< Show all >',
                            '< Show all >',
                            '< Show all >',
                            '< Show all >',
                        ],
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
