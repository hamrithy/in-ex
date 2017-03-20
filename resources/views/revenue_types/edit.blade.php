@extends ('layouts.dashboard')
@section('title')
Edit Revenue Type
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Revenue Type</h3>
    </div>
    {{Form::model($revenue_type,['url'=>'/setup-data/revenue-type/edit/'.$revenue_type->id,'method'=>'post'])}}
        <div class="box-body">
            <div class="form-group @if ($errors->has('type')) has-error @endif">
                {{Form::label('type','Type')}}
                {{Form::text('type',old('type'),['class'=>'form-control','placeholder'=>'Enter revenue type'])}}
                @if ($errors->has('type'))
	                <span class="help-block">{{ $errors->first('type') }}</span>
	            @endif
            </div>
            <div class="form-group @if ($errors->has('note')) has-error @endif">
                {{Form::label('note','Note')}}
                {{Form::textarea('note',old('note'),['rows'=>5,'class'=>'form-control','placeholder'=>'Enter revenue note'])}}
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