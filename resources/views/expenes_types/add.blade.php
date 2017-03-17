@extends ('layouts.dashboard')
@section('title')
Create Expenes Type
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Expenes Type</h3>
    </div>
    {{Form::open(['url'=>'/dashboard/expenes-types/add','method'=>'post'])}}
        <div class="box-body">
            <div class="form-group @if ($errors->has('type')) has-error @endif">
                {{Form::label('type','Expenes Type')}}
                {{Form::text('type',old('type'),['class'=>'form-control','placeholder'=>'Enter currency type'])}}
                @if ($errors->has('type'))
	                <span class="help-block">{{ $errors->first('type') }}</span>
	            @endif
            </div>
            <div class="form-group @if ($errors->has('note')) has-error @endif">
                {{Form::label('note','Note')}}
                {{Form::textarea('note',old('note'),['rows'=>5,'class'=>'form-control','placeholder'=>'Enter currency note'])}}
                @if ($errors->has('note'))
	                <span class="help-block">{{ $errors->first('note') }}</span>
	            @endif
            </div>
        </div>
        <div class="box-footer">
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        </div>
    {{Form::close()}}
</div>
@endsection