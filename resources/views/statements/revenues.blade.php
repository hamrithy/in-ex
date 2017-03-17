<div class="row">
    <table class="table table-hover">
        <tr>
            <th>Date</th>
            <th>Reference No</th>
            <th>Revenue Type</th>
            <th>Price</th>
            <th>Exchange rate</th>
            <th>Total</th>
        </tr>
        @foreach($revenues as $revenue)
        <tr>
            <td>{{$revenue->created_at}}</td>
            <td>{{$revenue->reference_no}}</td>
            <td>{{$revenue->revenue_type->type}}</td>
            <td>{{$revenue->currency}} {{$revenue->price}}</td>
            <td>{{$revenue->currency}} {{$revenue->exchange_rate}}</td>
            <td>USD {{$revenue->total}}</td>
        </tr>
        @endforeach
        <tr class="alert alert-success grand-total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>GRAND TOTAL:</b></td>
            <td class=""><b>USD {{$totalRevenue}}</b></td>
        </tr>
    </table>
</div>
{{--<div class="row">
    <div class="col-sm-5">
        <div class="pagination-info">Showing {{$revenues->currentPage()*$revenues->perPage()}} of {{$revenues->total()}} entries</div>
    </div>
    <div class="col-sm-7">
        <div class="pagination-container">
            {{$revenues->links()}}
        </div>
    </div>
</div>--}}