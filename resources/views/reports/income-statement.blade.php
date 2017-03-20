@extends ('layouts.dashboard')
@section('title')
Imcome Statement
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        {{Form::open(['url'=>'/report/income-statement','method'=>'post','id'=>'frmStatement'])}}
        <div class='col-md-3'>
            <div class="form-group">
                {{Form::label('from','From Date')}}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{Form::text('from',old('from'),['class'=>'form-control','placeholder'=>'Select date'])}}
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group">
                {{Form::label('to','To Date')}}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{Form::text('to',old('to'),['class'=>'form-control','placeholder'=>'Select date'])}}
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group">
                {{Form::label('','Action',['style'=>'visibility:hidden;'])}}
                <div class="input-group">
                    {{Form::hidden('net_income',null,['id'=>'netIncome'])}}
                    <button type="button" onclick="checkValue();" class="btn btn-primary"><i class="fa fa-hourglass-half"></i> Filter</button>
                    <button type="button" id="btnPrint" onclick="printPage();" class="btn disabled"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
<div id="revenue-expenes-container"></div>
@endsection
@section('custom-script')
<script type="text/javascript">
    $("#from").datepicker({ 
        format: 'yyyy-mm-dd'
    })
    .on("changeDate",function(event){

        var startDate = new Date(event.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(event.date.valueOf())));

        $('#to').datepicker('setStartDate', startDate);

    });

    $("#to").datepicker({ 
        format: 'yyyy-mm-dd'
    });

    function checkValue(){
        $("#btnPrint").addClass('disabled');
        if($("#from").val()!='' && $("#to").val()!=''){
            /*getRevenue();
            getExpenes();*/
            getFilter();
        }
    }

    function getFilter(){
        var from=$("#from").val();
        var to=$("#to").val();
        $.ajax({
            url : '/report/income-statement/'+from+'/'+to,
            method:'GET',
            dataType:'html',
            success:function(response){
                $("#revenue-expenes-container").html(response);
                $("#btnPrint").removeClass('disabled');
            }
        });
    }

    function printPage () {
        var data=$("#frmStatement").serializeArray();
        $.ajax({
            url : '/report/income-statement',
            method:'POST',
            dataType:'json',
            data:data,
            success:function(response){
            }
        });
        var report ="income-statement";
        var from=$("#from").val();
        var to=$("#to").val();
        window.open('{{url('')}}'+"/report/print/"+report+"/"+from+"/"+to,"_blank"); 
    }
</script>
@section('flashMessage')
    @if (session('flashMessage'))
    <section id="flashMessage">
        <div id="className" class="alert alert-{{session('flashMessage')['status']}}" style="margin-bottom: 0;">
            <span id="message">{{session('flashMessage')['message']}}</span>
            <i class="fa fa-close close-msg"></i>
        </div>
    </section>
    @endif
@endsection
@endsection
@section('custom-style')
<style>
    .datepicker table tr td.disabled, .datepicker table tr td.disabled:hover{
        color:#ccc;
    }
    #revenues-container tr:nth-child(even),
    #expenes-container tr:nth-child(even){
        background: #f4f4f4;
    }
    .pagination-container{
        text-align: right;
    }
    .pagination-container .pagination{
        margin: 0 0 15px;
    }
    .pagination-info{
        margin-top: 5px;
    }
    .row{
        margin: 0;
    }
    .net-income{
        margin-bottom: 0;
        text-align: right;
        padding-right: 50px;
    }
    .net-income span{
        margin-left: 40px;
    }
</style>
@endsection