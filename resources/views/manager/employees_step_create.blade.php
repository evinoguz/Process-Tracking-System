@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <a href="{{url('/employees_step')}}">Employees Step List</a>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! Form::open(['url'=>'/employees_step','method'=>'order','files'=>true]) !!}
                {!! Form::bsSelect('user_id','User Name',null,$users,'User Select') !!}
                {!! Form::bsSelect('step_id','Step Name',null,$steps,'Steps Select') !!}
                {!! Form::bsSelect('sub_step_id','Sub Step Name',null,$sub_steps,'Sub Steps Select') !!}
                {!! Form::bsSubmit('Save') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


