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
            @foreach($expenes as $expene)
            <tr>
                <td>{{$expene->created_at}}</td>
                <td>{{$expene->reference_no}}</td>
                <td>{{$expene->expenes_type->type}}</td>
                <td>{{$expene->currency}} {{number_format($expene->price, 2, '.', ',')}}</td>
                <td>{{$expene->currency}} {{number_format($expene->exchange_rate, 2, '.', ',')}}</td>
                <td>USD {{number_format($expene->total, 2, '.', ',')}}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="alert alert-danger"><b>GRAND TOTAL:</b></td>
                <td class="alert alert-danger"><b>USD {{number_format($totalExpenes, 2, '.', ',')}}</b></td>
            </tr>
        </table>
    </div>
</div>