@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="app-title">
<div>
<h1><i class="fa fa-dashboard"></i></h1>
</div>
</div>
<div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Products</h4>
                    <p><b id="no_products"></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-thumbs-o-up fa-3x"></i>
                <div class="info">
                    <h4>Orders</h4>
                    <p><b id="no_orders"></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Users</h4>
                    <p><b id="no_users"></b></p>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Today's Sales</h4>
                    <p><b>500</b></p>
                </div>
            </div>
        </div> -->
    </div>
@endsection
