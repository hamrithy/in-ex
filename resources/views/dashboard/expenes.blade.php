@extends ('layouts.dashboard')
@section('title')
Expense List
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title"><div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-btn">
                            <a href="/post-data/expense/add" class="btn btn-block btn-primary">Create New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                        <tr>
                            <th>Date</th>
                            <th>Reference No</th>
                            <th>Expense Type</th>
                            <th>Price</th>
                            <th>Exchange Rate</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        @foreach($expenes as $expene)
                        <tr>
                            <td>{{$expene->date}}</td>
                            <td>{{$expene->reference_no}}</td>
                            <td>{{$expene->expenes_type->type}}</td>
                            <td>{{$expene->currency}} {{number_format($expene->price, 2, '.', ',')}}</td>
                            <td>{{$expene->currency}} {{number_format($expene->exchange_rate, 2, '.', ',')}}</td>
                            <td>USD {{number_format($expene->total, 2, '.', ',')}}</td>
                            <td>
                                <a href="/post-data/expense/edit/{{$expene->id}}" class="text-primary">Edit</a>
                                 | 
                                <a class="btnDelete text-danger" data-url="/post-data/expense/delete/{{$expene->id}}" href="javascript:void(0)" >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection