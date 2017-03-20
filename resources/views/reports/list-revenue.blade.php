<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table">
            <tr>
                <th>Date</th>
                <th>Reference No</th>
                <th>Expenes Type</th>
                <th>Price</th>
                <th>Exchange rate</th>
                <th>Total</th>
            </tr>
            @foreach($revenues as $revenue)
            <tr>
                <td>{{$revenue->created_at}}</td>
                <td>{{$revenue->reference_no}}</td>
                <td>{{$revenue->revenue_type->type}}</td>
                <td>{{$revenue->currency}} {{number_format($revenue->price, 2, '.', ',')}}</td>
                <td>{{$revenue->currency}} {{number_format($revenue->exchange_rate, 2, '.', ',')}}</td>
                <td>USD {{number_format($revenue->total, 2, '.', ',')}}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="alert alert-success"><b>GRAND TOTAL:</b></td>
                <td class="alert alert-success"><b>USD {{number_format($totalRevenue, 2, '.', ',')}}</b></td>
            </tr>
        </table>
    </div>
</div>