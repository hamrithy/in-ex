@extends ('layouts.dashboard')
@section('title')
Statements
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title"><div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-btn">
                            <a href="/dashboard/statements/add" class="btn btn-block btn-primary">Print Statement</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                        <tr>
                            <th>Date</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Net Income</th>
                            <th>Action</th>
                        </tr>
                        @foreach($statements as $statement)
                        <tr>
                            <td>{{$statement->created_at}}</td>
                            <td>{{$statement->from}}</td>
                            <td>{{$statement->to}}</td>
                            <td>${{$statement->net_income}}</td>
                            <td>
                                <a class="btnDelete text-danger" data-url="/dashboard/statements/delete/{{$statement->id}}" href="javascript:void(0)" >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection