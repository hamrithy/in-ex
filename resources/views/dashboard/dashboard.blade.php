@extends('layouts.dashboard')
@section('title')
Dashboard
@endsection
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>${{$revenue}}</h3>
                <p>Revenues</p>
            </div>
            <div class="icon">
                <i class="fa fa-line-chart"></i>
            </div>
            <a href="/post-data/revenue" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>${{$expenes}}{{--<sup style="font-size: 20px">%</sup>--}}</h3>
                <p>Expenes</p>
            </div>
            <div class="icon">
                <i class="fa fa-bar-chart"></i>
            </div>
            <a href="/post-data/expense" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>${{$revenue-$expenes}}</h3>
                <p>Net Income</p>
            </div>
            <div class="icon">
                <i class="fa fa-area-chart"></i>
            </div>
            <a href="/report/income-statement" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$user}}</h3>
                <p>Users</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
@endsection
@section('custom-style')
<style>
    .small-box h3{
        /* white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; */
        width: 50%;
    }
</style>
@endsection