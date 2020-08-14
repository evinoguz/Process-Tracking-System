@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <a href="{{url('/order')}}">Orders List</a>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! Form::open(['url'=>'/order','method'=>'order','files'=>true]) !!}
                {!! Form::bsSelect('product_id','Product',null,$products,'Product Select') !!}
                {!! Form::bsSubmit('Buy') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


