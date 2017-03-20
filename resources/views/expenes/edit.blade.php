@extends ('layouts.dashboard')
@section('title')
Edit Expenes
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Expenes</h3>
    </div>
    {{Form::model($expenes,['url'=>'/post-data/expense/edit/'.$expenes->id,'method'=>'post'])}}
        <div class="box-body">
            <div class="form-group @if ($errors->has('date')) has-error @endif">
                {{Form::label('date','Expense Date')}}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{Form::text('date',old('date'),['class'=>'form-control','placeholder'=>'Select date'])}}
                    @if ($errors->has('date'))
                        <span class="help-block">{{ $errors->first('date') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if ($errors->has('reference_no')) has-error @endif">
                {{Form::label('reference_no','Reference No')}}
                {{Form::text('reference_no',old('reference_no'),['class'=>'form-control','placeholder'=>'Enter reference no'])}}
                @if ($errors->has('reference_no'))
	                <span class="help-block">{{ $errors->first('reference_no') }}</span>
	            @endif
            </div>
            <div class="form-group @if ($errors->has('expenes_type_id')) has-error @endif">
                {{Form::label('expenes_type_id','Expense Type')}}
                {{Form::select('expenes_type_id',$expenes_types,old('expenes_type_id'),['class'=>'form-control','placeholder'=>'Select expense type'])}}
                @if ($errors->has('expenes_type_id'))
                    <span class="help-block">{{ $errors->first('expenes_type_id') }}</span>
                @endif
            </div>
            <div class="form-group @if ($errors->has('currency')) has-error @endif">
                {{Form::label('currency','Currency')}}
                {{Form::select('currency',$currencies,old('currency'),['class'=>'form-control','placeholder'=>'Select currency'])}}
                @if ($errors->has('currency'))
                    <span class="help-block">{{ $errors->first('currency') }}</span>
                @endif
            </div>
            <div class="form-group @if ($errors->has('price')) has-error @endif">
                {{Form::label('price','Expense Price')}}
                {{Form::number('price',old('price'),['class'=>'form-control','placeholder'=>'Enter expense price', 'step'=>'any'])}}
                @if ($errors->has('price'))
                    <span class="help-block">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="form-group @if ($errors->has('exchange_rate')) has-error @endif">
                {{Form::label('exchange_rate','Price\'s Exchange Rate')}}
                {{Form::number('exchange_rate',old('exchange_rate'),['class'=>'form-control','placeholder'=>'Exchange rate in 1 USD', 'step'=>'any'])}}
                @if ($errors->has('exchange_rate'))
                    <span class="help-block">{{ $errors->first('exchange_rate') }}</span>
                @endif
            </div>
        </div>
        <div class="box-footer">
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        </div>
    {{Form::close()}}
</div>
@endsection
@section('custom-script')
<script>
    $("#date").datepicker({ 
        format: 'yyyy-mm-dd'
    });
</script>
@endsection