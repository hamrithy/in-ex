<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Revenues Table</h3>
    </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
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
</div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Expenes Table</h3>
    </div>
    <div class="box-body table-responsive no-padding">
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
</div>
<div class="box-footer">
    <div class="box-body table-responsive no-padding" id="">
        <table class="table table-hover">
            <tr class="alert alert-success">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><p class="net-income"><b>NET INCOME: <span id="netIncome">USD {{$totalRevenue-$totalExpenes}}</span></b></p></td>
            </tr>
        </table>
    </div>
</div>
<script>
    $("#netIncome").val({{$totalRevenue-$totalExpenes}});
</script>