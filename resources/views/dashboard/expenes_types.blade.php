@extends ('layouts.dashboard')
@section('title')
Expense Type List
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title"><div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-btn">
                            <a href="/setup-data/expense-type/add" class="btn btn-block btn-primary">Create New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                        <tr>
                            <th>Date</th>
                            <th>Expense Type</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                        @foreach($expenes_types as $expenes_type)
                        <tr>
                            <td>{{$expenes_type->created_at}}</td>
                            <td>{{$expenes_type->type}}</td>
                            <td>{{$expenes_type->note}}</td>
                            <td>
                                <a href="/setup-data/expense-type/edit/{{$expenes_type->id}}" class="text-primary">Edit</a>
                                 | 
                                <a class="btnDelete text-danger" data-url="/setup-data/expense-type/delete/{{$expenes_type->id}}" href="javascript:void(0)" >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection