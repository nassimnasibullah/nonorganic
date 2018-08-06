<page>

    <img src="admin/assets/kop.png"/>
    <hr/>
    <table style="margin-right: 30px;margin-left: 30px;" class="table table-striped table-bordered dataex-visibility-print">

        <thead>
        <tr>
            <th class="border-top-0" width="150px;">Status</th>
            <th class="border-top-0" width="150px;">Nama Pelanggan</th>
            <th class="border-top-0" width="150px;">Pembayaran</th>
            <th class="border-top-0" width="150px;">Kurir</th>
            <th class="border-top-0" width="150px;">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $index => $order)
        <tr>
            @if($order->status == 0)
            <td class="text-truncate"><i class="la la-dot-circle-o warning font-medium-1 mr-1"></i>Pending</td>
            @elseif($order->status == 1)
            <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>Lunas</td>
            @else
            <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>Ditolak</td>
            @endif
            <td class="text-truncate">
                <span>{{ $order->customer->name }}</span>
            </td>

            <td>
               {{ $order->payment->name }}
            </td>
                @if($order->payment_id ==  1)
                    <td class="text-truncate"> - </td>
                @else
                    <td class="text-truncate">{{ $order->courier->name }}</td>
                @endif
                    <td class="text-truncate">{{ $order->total }}</td>
        </tr>
        @endforeach
        </tbody>


    </table>
</page>
