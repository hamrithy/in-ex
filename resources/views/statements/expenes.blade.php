<div class="row">
    <table class="table table-hover">
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
            <td>{{$expene->currency}} {{$expene->price}}</td>
            <td>{{$expene->currency}} {{$expene->exchange_rate}}</td>
            <td>USD {{$expene->total}}</td>
        </tr>
        @endforeach
        <tr class="alert alert-danger grand-total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>GRAND TOTAL:</b></td>
            <td class=""><b>USD {{$totalExpenes}}</b></td>
        </tr>
    </table>
</div>
{{--<div class="row">
    <div class="col-sm-5">
        <div class="pagination-info">Showing {{$expenes->currentPage()*$expenes->perPage()}} of {{$expenes->total()}} entries</div>
    </div>
    <div class="col-sm-7">
        <div class="pagination-container">
            {{$expenes->links()}}
        </div>
    </div>
</div>--}}