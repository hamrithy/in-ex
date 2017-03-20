@extends ('layouts.dashboard')
@section('title')
Revenues
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title"><div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-btn">
                            <a href="/dashboard/revenues/add" class="btn btn-block btn-primary">Create New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                        <tr>
                            <th>Date</th>
                            <th>Reference No</th>
                            <th>Revenue Type</th>
                            <th>Price</th>
                            <th>Exchange rate</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        @foreach($revenues as $revenue)
                        <tr>
                            <td>{{$revenue->date}}</td>
                            <td>{{$revenue->reference_no}}</td>
                            <td>{{$revenue->revenue_type->type}}</td>
                            <td>{{$revenue->currency}} {{number_format($revenue->price, 2, '.', ',')}}</td>
                            <td>{{$revenue->currency}} {{number_format($revenue->exchange_rate, 2, '.', ',')}}</td>
                            <td>USD {{number_format($revenue->total, 2, '.', ',')}}</td>
                            <td>
                                <a href="/dashboard/revenues/edit/{{$revenue->id}}" class="text-primary">Edit</a>
                                 | 
                                <a class="btnDelete text-danger" data-url="/dashboard/revenues/delete/{{$revenue->id}}" href="javascript:void(0)" >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection