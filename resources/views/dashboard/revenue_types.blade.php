@extends ('layouts.dashboard')
@section('title')
Revenue Type List
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title"><div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-btn">
                            <a href="/setup-data/revenue-type/add" class="btn btn-block btn-primary">Create New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                        <tr>
                            <th>Date</th>
                            <th>Revenue Type</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                        @foreach($revenue_types as $revenue_type)
                        <tr>
                            <td>{{$revenue_type->created_at}}</td>
                            <td>{{$revenue_type->type}}</td>
                            <td>{{$revenue_type->note}}</td>
                            <td>
                                <a href="/setup-data/revenue-type/edit/{{$revenue_type->id}}" class="text-primary">Edit</a>
                                 | 
                                <a class="btnDelete text-danger" data-url="/setup-data/revenue-type/delete/{{$revenue_type->id}}" href="javascript:void(0)" >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection